<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatherController extends Controller
{
    const SPACE_ID = "NMqppR61QkKUarTd\beach_bar";

    public function getGuestsList()
    {
        $path = "https://gather.town/api/getEmailGuestlist";

        $headers = [
            'Content-Type'  => 'application/json',
        ];

        $body = [
            'apiKey' => env('GATHER_API_KEY', ''),
            'spaceId'  => self::SPACE_ID,
        ];

        $response = Http::withHeaders($headers)->get($path, $body);

        return $response->getStatusCode() === 200 ? $response->body() : null;
    }

    public static function setGuestsList()
    {
        $users = User::role(['teacher', 'student', 'admin'])->get();
        $guestlist = array();

        foreach ($users as $user) {

            if ($user->getRoleNames()->first() == "teacher" || $user->getRoleNames()->first() == "admin") {
                $role = "moderator";
            } else {
                $role = "member";
            }

            $guestList[$user->email] = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'affiliation' => $user->getRoleNames()->first(),
                'role' => $role,
            ];
        }

        $path = "https://gather.town/api/setEmailGuestlist";

        $headers = [
            'Content-Type'  => 'application/json',
        ];

        $body = [
            'apiKey' => env('GATHER_API_KEY', ''),
            'spaceId'  => self::SPACE_ID,
            'guestlist' => $guestList,
            'overwrite' => 'true',
        ];

        $response = Http::withHeaders($headers)->post($path, $body);

        return $response->getStatusCode() === 200 ? $response->body() : null;
    }

    public static function editGuestsList($ids)
    {

        $users = User::find($ids);

        $guestlist = array();
        foreach ($users as $user) {

            if ($user->getRoleNames()->first() == "teacher" || $user->getRoleNames()->first() == "admin") {
                $role = "moderator";
            } else {
                $role = "member";
            }

            $guestList[$user->email] = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'affiliation' => $user->getRoleNames()->first(),
                'role' => $role,
            ];
        }

        $path = "https://gather.town/api/setEmailGuestlist";

        $headers = [
            'Content-Type'  => 'application/json',
        ];

        $body = [
            'apiKey' => env('GATHER_API_KEY', ''),
            'spaceId'  => self::SPACE_ID,
            'guestlist' => $guestList,
        ];

        $response = Http::withHeaders($headers)->post($path, $body);

        return $response->getStatusCode() === 200 ? $response->body() : null;
    }
}
