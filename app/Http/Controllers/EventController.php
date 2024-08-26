<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRegistration\StoreRequest;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\EventUserDetail;
use App\Models\Section;
use App\Models\Transaction;
use App\Models\User;
use App\Services\PaymayaService;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{   
    public $paymayaService;
    public function __construct(PaymayaService $paymayaService) {
        $this->paymayaService = $paymayaService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $endPoint = 'list';
        $events = Event::all();

        if ($request->ajax()) {
            return DataTables::of($events)
                ->editColumn('start_date', function ($event) {
                    return Carbon::parse($event->start_date)->format('F d, Y');    
                })
                ->addColumn('actions', function ($event) {
                    $actions = "<div class='hstack gap-2'>
                        <a href='" . route('events.show', ['title' => $event->title]) . "' target='_blank' class='btn btn-soft-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='View'><i class='ri-eye-fill align-bottom'></i></a>
                        <a href='" . route('events.edit', ['event' => $event->id]) . "' class='btn btn-soft-success btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit'><i class='ri-pencil-fill align-bottom'></i></a>
                        <button type='button' class='btn btn-soft-danger btn-sm remove-btn' id='" . $event->id . "' data-bs-toggle='tooltip' data-bs-placement='top' title='Remove'><i class='ri-delete-bin-5-fill align-bottom'></i></button>
                    </div>";

                    return $actions;
                })
                ->addColumn('section', function ($event) {
                    $section = Section::find($event->section_id);

                    // Return 'N/A' if no section is found
                    return $section ? $section->name : 'N/A';

                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('pages.events.list', compact('endPoint'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        try {
            if ($request->ajax()) {
                $filename = '';
                $file = "";
                if ($request->hasFile('event_poster')) {
                    $file = $request->file('event_poster');
                    $filename = time() . '_' . $file->getClientOriginalName();
                }

                $request->validate([
                    'event_title' => ['required', 'string', 'max:255'],
                    'event_type' => ['required', 'string', 'max:255'],
                    'event_section' => ['required', 'integer'],
                    'event_date' => ['required'],
                    'event_time' => '',
                    'event_location' => ['required', 'string', 'max:255'],
                    'latitude' => '',
                    'longitude' => '',
                    'event_reg_fee' => '',
                    'event_poster' => ['required', 'file', 'mimes:jpeg,png,jpg'],
                    'event_description' => ['required', 'string'],
                ]);

                $start_date = $request->event_date;
                $end_date = $request->event_date;

                if (strpos($request->event_date, 'to') !== false) {
                    $dates = explode(' to ', $request->event_date);
                    $start_date = $dates[0] ?? '';
                    $end_date = $dates[1] ?? '';
                }


                $data = [
                    'title' => $request->event_title,
                    'type' => $request->event_type,
                    'section_id' => $request->event_section,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'time' => $request->event_time,
                    'location' => $request->event_location,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'reg_fee' => $request->event_reg_fee ?? 0,
                    'poster' => $filename,
                    'description' => $request->event_description,
                    'is_open_for_non_community' => $request->has('is_open_for_non_community'),
                    'is_enable_event_registration' => $request->has('is_enable_event_registration'),
                ];

                $event = Event::create($data);

                if ($event) {
                    $file->move(public_path('uploads'), $filename);
                    return response()->json(['message' => 'Event Created Successfully'], 200);
                }
            }
        } catch (ValidationException $e) {
            // Return validation errors
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $identifier)
    {   
        if(is_numeric($request->identifier)) {
            $event = Event::findOrFail($identifier);
        } else {
            $event = Event::where('title', $identifier)->firstOrFail();
        }

        if($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'event' => $event,
            ]);
        }

        return view('pages.events.show', compact('event'));
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

    public function calendar(Request $request) {
        return view('apps-calendar');
    }

    public function all(Request $request) {
        $events = Event::query();

        if($request->query('filter') && $request->query('filter') === "upcoming-events") {
            $today = Carbon::now()->toDateString();
            $events = $events->where("start_date", '>', $today);
        }

        $events = $events->get();

        return response()->json([
            'status' => 'success',
            'events' => $events,
        ], 200);
    }

    public function fullCalendar(Request $request) {
        $events = Event::where('status', 'Active')->with('section')->get()->map(function($event) {

            switch($event->section->name) {
                case 'kids':
                    $classname = 'bg-orange-subtle';
                    break;
                case 'youth':
                    $classname = 'bg-blue-subtle';
                    break;
                case 'singles':
                    $classname = 'bg-success-subtle';
                    break;
                case 'servants':
                    $classname = 'bg-warning-subtle';
                        break;
                case 'handmaids':
                    $classname = 'bg-danger-subtle';
                        break;
                case 'couples':
                    $classname = 'bg-info-subtle';
                        break;       
                default:
                    $classname = 'bg-primary-subtle';
                        break;
            }


            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => Carbon::parse($event->end_date)->addDay(), 
                'className' => $classname,
                'extendedProps' => [
                    'time' => $event->time,
                    'location' => $event->location,
                    'description' => $event->description,
                    'registration_fee' => $event->reg_fee, 
                    'is_enable_event_registration' => $event->is_enable_event_registration,
                ],
                'allDay' => true
            ];
        });
    
        return response()->json([
            'events' => $events
        ]);
    }

    public function register(Request $request) {
        $endPoint = "Event Registration";
        $event = Event::where('id', $request->event_id)->first();

        if(!$event->is_enable_event_registration) abort(404);

        return view('pages.events.register', compact('endPoint', 'event'));
    }

    public function save_registration(StoreRequest $request) {
        try {
            DB::beginTransaction();
            $event = Event::where('id', $request->event_id)->first();
            $users_count = count($request->users);
            $auth_user = Auth::user();

            $total_amount = 0;
            for ($i=0; $i < $users_count; $i++) { 
                $total_amount += $event->reg_fee;
            }
            
            $transaction_code = generateTransactionCode();
            $reference_code = generateReferenceCode();

            $transaction = Transaction::create([
                'transaction_code' => $transaction_code,
                'reference_code' => $reference_code,
                'sub_amount' => $event->reg_fee,
                'total_amount' => $total_amount,
                'payment_mode' => "N/A",
                'payment_type' => 'event_registration',
                'status' => 'pending', 
            ]);

            foreach ($request->users as $user_id) {
                $user = User::where('id', $user_id)->first();

                $event_registration = EventRegistration::create([
                    'transaction_id' => $transaction->id,
                    'event_id' => $event->id,
                    'mfc_id_number' => $user->mfc_id_number,
                    'amount' => $event->reg_fee,
                    'registered_by' => $auth_user->id,
                    'registered_at' => Carbon::now(),
                ]);

                EventUserDetail::create([
                    'event_registration_id' => $event_registration->id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'contact_number' => $user->contact_number,
                    'address' => $user->address,
                ]);
            }

            $paymaya_user_details = [
                'firstname' => $auth_user->first_name,
                'lastname' => $auth_user->last_name,
            ];

            $payment_request_model = $this->paymayaService->createRequestModel($transaction, $paymaya_user_details);
            $payment_response = $this->paymayaService->pay($payment_request_model);

            $transaction->update([
                'checkout_id' => $payment_response['checkoutId'],
                'payment_link' => $payment_response['redirectUrl'],
            ]);
            
            DB::commit();

            return redirect($payment_response['redirectUrl']);
    
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('fail', $exception->getMessage());
        }
    }    
    
}
