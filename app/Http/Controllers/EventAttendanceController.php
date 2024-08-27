<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventAttendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventAttendanceController extends Controller
{
    public function getEventUsers(Request $request) {
        $users = User::query();
        $event_attendances = EventAttendance::where("event_id", $request->event_id)->get();

        if($request->query('search')) {
            $searchQuery = $request->query('search');
            $users = $users->where('mfc_id_number', $searchQuery)
                        ->orWhere('first_name', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere(DB::raw("concat(first_name, ' ', last_name)"), 'LIKE', '%' . $searchQuery . '%');
        }

        $users = $users->with('section')->get();

        // Get all event attendances for the specific event
        $event_attendances = EventAttendance::where("event_id", $request->event_id)->pluck('user_id')->toArray();

        // Add a 'checked' property to each user if they are in the event attendances
        $users = $users->map(function ($user) use ($event_attendances) {
            $user->checked = in_array($user->id, $event_attendances);
            return $user;
        });

        return response()->json([
            "message" => "success",
            "users" => $users,
        ]); 
    }

    public function saveAttendance(Request $request) {
        $user = User::where("id", $request->user_id)->first();
        $event = Event::where("id", $request->event_id)->first();
        
        if($request->checked) {
            EventAttendance::updateOrCreate([
                'event_id' => $event->id,
                'user_id' => $user->id,
                'attendance_date' => Carbon::now()
            ], []);
        } else {
            EventAttendance::where('event_id', $request->event_id)->where('user_id', $request->user_id)->delete();
        }

        return response()->json([
            "status" => "success",
            "message" => "Attendance recorded successfully",
        ]);
    }

    public function report(Request $request) {
        $event_attendance = EventAttendance::select('attendance_date', DB::raw('MAX(event_id) as event_id'))
                                        ->where("event_id", $request->event_id)
                                        ->groupBy('attendance_date')
                                        ->with('user')
                                        ->get();

        if(count($event_attendance) <= 0) {
            return back()->with('fail', 'No attendance record found.');
        }

        return view('pages.reports.event-attendance-report');
    }
}
