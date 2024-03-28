<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Enrolment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class ClassroomController extends Controller
{
    // public function openRoom(){

    //     $payload =  array(
    //             "context" => 
    //                 array(
    //                     "user" => 
    //                     array(
    //                         "affiliation" => "owner",
    //                         "avatar" => auth()->user()->profile_photo_path,
    //                         "name" => auth()->user()->name,
    //                         "email" => auth()->user()->email,
    //                         "id" => auth()->user()->id
    //                     ),
    //                     "group" => ""
    //                 ),
    //             "aud" => "jitsi",
    //             "iss" => "6a1e3f9f235290703051db58d31eaa4d",
    //             "sub" => "meet.theuttererscorner.com",
    //             "room" => auth()->user()->meeting_id,
    //             "exp" => time() + 3600,
    //             "moderator" => true
    //         );

    //     $secret = "e62825bd26e4798584c688b74b531b87";

    //     $payload = JWT::encode($payload,$secret);

    //     return redirect('https://meet.theuttererscorner.com/'.auth()->user()->meeting_id.'?jwt='.$payload);
    // }

    private function checkAccess($userId, $classId)
    {
        $class = Classes::find($classId);
        $enrolment = Enrolment::find($class->enrolment_id);
        $user = User::find($userId);
        $classStartDate = Carbon::createFromTimeString($class->start_date);
        $classEndDate = Carbon::createFromTimeString($class->end_date);

        if ($user::role('teacher') && $enrolment->teacher->id == $userId)
            if (now()->between($classStartDate->subMinutes(10), $classEndDate))
                return true;

        if ($user::role('teacher') && $enrolment->student->id == $userId)
            if (now()->between($classStartDate->subSeconds(30), $classEndDate))
                return true;

        return false;
    }

    public function openRoom($id)
    {
        // $current_period = ApportionmentController::getPeriod('2022-05-17'); //TO_DELETE
        $current_period = ApportionmentController::currentPeriod();
        $enrolments = Enrolment::where('student_id', $id)->get();
        if (count($enrolments) > 0) {
            $classes = collect([]);
            foreach ($enrolments as $enrolment) {
                $classes = $classes->merge(Classes::where('enrolment_id', $enrolment->id)->where('end_date', '>=', now())->get());
            }

            if (count($classes) > 0) {

                $classes = $classes->sortBy('start_date');

                $currentClass = $classes->sortBy('start_date')->filter(function ($class) {
                    return Carbon::now()->between($class->start_date, $class->end_date);
                })->first();

                $nextClass = $classes->first();

                $student = User::find($id);
                $enter_classroom = false;
                $message = "Student doesn't have any class left.";
                $user = User::find(auth()->id());
                $user = $user->getRoleNames();
                $user = $user[0];
                $message2 = "";
                $time = 0;


                if ($currentClass) {
                    if ($this->checkAccess(auth()->id(), $currentClass->id))
                        return redirect($currentClass->meeting->join_url);
                    else
                        abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
                } else {
                    $time = now()->diffInSeconds($nextClass->start_date);
                    $message1 = "Class not available yet.";
                    $message2 = "Next class on ";
                    return view('classroom.show', compact('message1', 'message2', 'student', 'user', 'time'));
                }
            } else {
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
            }
        } else {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
        }
    }
}
