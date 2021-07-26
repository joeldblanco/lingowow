<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class ClassroomController extends Controller
{
    public function openRoom(){

        $payload =  array(
                "context" => 
                    array(
                        "user" => 
                        array(
                            "affiliation" => "owner",
                            "avatar" => auth()->user()->profile_photo_path,
                            "name" => auth()->user()->name,
                            "email" => auth()->user()->email,
                            "id" => auth()->user()->id
                        ),
                        "group" => ""
                    ),
                "aud" => "jitsi",
                "iss" => "6a1e3f9f235290703051db58d31eaa4d",
                "sub" => "meet.theuttererscorner.com",
                "room" => auth()->user()->meeting_id,
                "exp" => time() + 3600,
                "moderator" => true
            );

        $secret = "e62825bd26e4798584c688b74b531b87";

        $payload = JWT::encode($payload,$secret);
        
        return redirect('https://meet.theuttererscorner.com/'.auth()->user()->meeting_id.'?jwt='.$payload);
    }
}
