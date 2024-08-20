<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventAttendanceController extends Controller
{
    public function users(Request $request) {
        $users = User::query();
        $event_attendances = EventAttendance::where("event_id", $request->event_id)->get();

        $users = $users->get();

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

        // if($auth_user->hasRole('area_servant')) {
        //     $users = 
        // };
    }

    public function saveAttendance(Request $request) {
        $user = User::where("id", $request->user_id)->first();
        $event = Event::where("id", $request->event_id)->first();
        
        if($request->checked) {
            EventAttendance::updateOrCreate([
                'event_id' => $event->id,
                'user_id' => $user->id,
            ], []);
        } else {
            EventAttendance::where('event_id', $request->event_id)->where('user_id', $request->user_id)->delete();
        }

        return response()->json([
            "status" => "success",
            "message" => "Attendance recorded successfully",
        ]);
    }
}
