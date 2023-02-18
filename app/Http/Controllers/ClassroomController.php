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

    public function openRoom($id)
    {
        // $current_period = ApportionmentController::getPeriod('2022-05-17'); //TO_DELETE
        $current_period = ApportionmentController::currentPeriod();
        $enrolment = Enrolment::where('student_id', $id)->first();
        if (isset($enrolment)) {
            $classes = Classes::where('enrolment_id', $enrolment->id)->whereDate('start_date', '>=', $current_period[0])->orderBy('start_date', 'asc')->get();

            $student = User::find($id);
            $enter_classroom = false;
            $message = "Student doesn't have any class left.";
            $user = User::find(auth()->id());
            $user = $user->getRoleNames();
            $user = $user[0];

            foreach ($classes as $key => $value) {
                $classes[$key] = Carbon::createFromTimeString($value->start_date);
                $now = Carbon::now(auth()->user()->timezone);
                $enter_classroom = false;
                $message = "";

                if ($now->lessThanOrEqualTo($classes[$key])) {
                    $diffInSeconds = $classes[$key]->diffInSeconds();

                    if (($diffInSeconds < 600 && $user == 'teacher') || ($diffInSeconds < 20 && $user == 'student') || $user == 'admin') {

                        return redirect($student->studentClasses->sortBy('start_date')->first()->meeting->join_url);

                        break;
                    } else {

                        $message2 = "On " . $classes[$key]->format('l') . ' at ' . $classes[$key]->format('g:00 a') . " UTC " . "(" . $classes[$key]->setTimezone(auth()->user()->timezone)->format('l') . " at " . $classes[$key]->setTimezone(auth()->user()->timezone)->format('g:00 a') . " " . auth()->user()->timezone . ").";

                        if ($user == 'student') {
                            $message1 = "Your next class is in " . $classes[$key]->diffForHumans(['parts' => 2]) . ".";
                            break;
                        }

                        if ($user == 'teacher') {
                            $message1 = "This student's next class is in " . $classes[$key]->diffForHumans(['parts' => 2]) . ".";
                            break;
                        }
                    }
                } else {
                    $diffInSeconds = $classes[$key]->diffInSeconds();
                    if ($user == 'admin' || (($classes[$key]->copy()->addMinutes(40) > now() && $diffInSeconds < 2400) && ($user == 'student' || $user == 'teacher'))) {
                        return redirect($student->studentClasses->sortBy('start_date')->first()->meeting->join_url);

                        break;
                    }
                }
            }

            return view('classroom.show', compact('enter_classroom', 'message1', 'message2', 'student', 'user'));
        } else {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
            // $message = "User is not enroled in any course.";
            // return view('classroom.show', compact('message'));
        }
    }
}
