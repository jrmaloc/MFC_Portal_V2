<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{
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
                ->addColumn('actions', function ($event) {
                    $actions = "<div class='hstack gap-2'>
                        <a href='" . route('events.show', ['event' => $event->id]) . "' class='btn btn-soft-primary btn-sm' data-bs-toggle='tooltip' data-bs-placement='top' title='View'><i class='ri-eye-fill align-bottom'></i></a>
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json([
        //     'success' => true,
        // ]);
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
                    'event_reg_fee' => '',
                    'event_category' => ['required', 'integer'],
                    'event_poster' => ['required', 'file', 'mimes:jpeg,png,jpg'],
                    'event_description' => ['required', 'string'],
                ]);

                $event_category = $request->event_category == 1 ? 'Open for Non-Community' : 'Enable Event Registration';

                $data = [
                    'title' => $request->event_title,
                    'type' => $request->event_type,
                    'section_id' => $request->event_section,
                    'date' => $request->event_date,
                    'time' => $request->event_time,
                    'location' => $request->event_location,
                    'reg_fee' => $request->event_reg_fee ?? 0,
                    'category' => $event_category,
                    'poster' => $filename,
                    'description' => $request->event_description,
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
    public function show(string $id)
    {
        //
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
