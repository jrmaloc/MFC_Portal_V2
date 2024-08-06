<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $user = User::findOrFail($id);

        return view('pages.profile.index', compact('user'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        dd($id);
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
}
