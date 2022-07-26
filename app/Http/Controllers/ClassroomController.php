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
        $enrolment = Enrolment::where('student_id',$id)->first();
        if(isset($enrolment)){
            $classes = Classes::where('enrolment_id',$enrolment->id)->whereDate('start_date','>=',$current_period[0])->orderBy('start_date','asc')->get();
            $next_classes = [];
            $current_tz = session('tz');
            $student = User::find($id);
            $enter_classroom = false;
            $message = "Student doesn't have any class left.";

        
            foreach($classes as $key => $value)
            {
                $classes[$key] = Carbon::createFromTimeString($value->start_date,'America/Lima');
                $now = Carbon::now($current_tz);
                $user = User::find(auth()->id());
                $user = $user->getRoleNames();
                $user = $user[0];
                $enter_classroom = false;
                $message = "";
    
                if($now->lessThanOrEqualTo($classes[$key]))
                {
                    $diffInSeconds = $classes[$key]->diffInSeconds();
    
                    // dd($now, $classes[$key], $diffInSeconds);
    
                    if(($diffInSeconds < 600 && $user == 'teacher') || ($diffInSeconds < 20 && $user == 'student') || $user == 'admin')
                    {
                        $message = "This student's next class is in ".$classes[$key]->diffForHumans(['parts' => 2]).". On ".$classes[$key]->format('l').' at '.$classes[$key]->format('g:00 a')." Lima Time.";
                        $enter_classroom = true;
                        break;
                    }else{
                        if($user == 'student')
                        {
                            $message = "Your next class is in ".$classes[$key]->diffForHumans(['parts' => 2]).". On ".$classes[$key]->format('l').' at '.$classes[$key]->format('g:00 a')." Lima Time.";
                            break;
                        }
    
                        if($user == 'teacher')
                        {
                            $message = "This student's next class is in ".$classes[$key]->diffForHumans(['parts' => 2]).". On ".$classes[$key]->format('l').' at '.$classes[$key]->format('g:00 a')." Lima Time.";
                            break;
                        }
                    }
                }
            }

            return view('classroom.show', compact('enter_classroom', 'message','student','user'));
            
        }else{
            $message="User is not enroled in any course.";
            return view('classroom.show', compact('message'));
        }
    }
}
