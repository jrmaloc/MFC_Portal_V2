<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\Section;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserMissionaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $section)
    {
        //
        $users = '';
        $btn_color = '';
        $breadcrumb = $section;
        switch ($section) {
            case 'kids':
                $users = User::where('section_id', 1)->get();
                $btn_color = 'btn-danger';
                break;
            case 'youth':
                $users = User::where('section_id', 2)->get();
                $btn_color = 'btn-primary';
                break;
            case 'singles':
                $users = User::where('section_id', 3)->get();
                $btn_color = 'btn-success';
                break;
            case 'handmaids':
                $users = User::where('section_id', 4)->get();
                $btn_color = 'btn-red';
                break;
            case 'servants':
                $users = User::where('section_id', 5)->get();
                $btn_color = 'btn-warning';
                break;
            default:
                $users = User::where('section_id', 6)->get();
                $btn_color = 'btn-info';
                break;
        }

        if ($request->ajax()) {
            return DataTables::of($users)
                ->addColumn('actions', function ($user) {
                    $actions = "<div class='hstack gap-2'>
                        <a href='" . route('users.show', ['user' => $user->id]) . "' class='btn btn-soft-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='View'><i class='ri-eye-fill align-bottom'></i></a>
                        <a href='" . route('users.edit', ['user' => $user->id]) . "' class='btn btn-soft-success btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit'><i class='ri-pencil-fill align-bottom'></i></a>
                        <button type='button' class='btn btn-soft-danger btn-sm remove-btn' id='" . $user->id . "' data-bs-toggle='tooltip' data-bs-placement='top' title='Remove'><i class='ri-delete-bin-5-fill align-bottom'></i></button>
                    </div>";

                    return $actions;
                })
                ->addColumn('name', function ($user) {
                    $name = $user->first_name . ' ' . $user->last_name;

                    return $name;
                })
                ->rawColumns(['actions', 'name'])
                ->make(true);
        }

        return view('pages.users.index', compact('section', 'breadcrumb', 'btn_color'));
    }

    public function profile(string $id)
    {   
        $sections = Section::get();
        $user = User::findOrFail($id);

        $user->load('missionary_services');
        

        return view('pages.profile.index', compact('user', 'sections'));
    }

    public function updateProfile(Request $request, string $id) {
        $data = $request->except('_token', '_method');
        $user = User::where('id', $id)->with('user_details')->firstOrFail();

        $user->update($data);

        if($user->user_details) {
            $user->user_details->update($data);
        } else {
            UserDetail::create(array_merge($data, ['user_id' => $user->id]));
        }
        
        return back()->withSuccess("Profile Updated Successfully");
        
    }

    public function updateProfileService(Request $request, $id) {
        $user = User::findOrFail($id);

        foreach ($request->service_category as $key => $category) {
            UserMissionaryService::updateOrCreate([
                "user_id" => $user->id,
                "service_category" => $category,
                "service_type" => $request->service_type[$key],
                "section" => $request->section[$key],
                "area" => $request->service_area[$key],
            ], []);
        }

        return back()->withSuccess("User service updated successfully.");
    }

    public function updatePassword(Request $request, $id) {
        $user = User::findOrFail($id);

        if(!Hash::check($request->old_password, $user->password)) return back()->with('fail', "The user password is not match in the old password.");

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->withSuccess('Change Password Successfully');
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request) {
        $users = User::query();

        if($request->query('mfc_user_id')) {
            $users = $users->where('mfc_id_number', $request->query('mfc_user_id'));
        }

        $users = $users->get();

        return response()->json([
            'status' => 'success',
            'users' => $users,
        ]);
    }
}
