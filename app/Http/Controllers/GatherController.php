<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatherController extends Controller
{
    public function getGuestsList()
    {
        $path = "https://gather.town/api/getEmailGuestlist";

        $headers = [
            'Content-Type'  => 'application/json',
        ];

        $body = [
            'apiKey' => env('GATHER_API_KEY', ''),
            'spaceId'  => 'Z1brs5e4jun0FRSm\lingowow',
        ];

        $response = Http::withHeaders($headers)->get($path, $body);

        return $response->getStatusCode() === 200 ? $response->body() : null;
    }

    public function setGuestsList()
    {
        $users = User::role(['teacher', 'student'])->get();
        $guestlist = array();

        foreach ($users as $user) {
            $guestList[$user->email] = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'affiliation' => $user->getRoleNames()->first(),
                'role' => $user->getRoleNames()->first() == "teacher" ? "moderator" : "member",
            ];
        }

        $path = "https://gather.town/api/setEmailGuestlist";

        $headers = [
            'Content-Type'  => 'application/json',
        ];

        $body = [
            'apiKey' => env('GATHER_API_KEY', ''),
            'spaceId'  => 'Z1brs5e4jun0FRSm\lingowow',
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
            $guestList[$user->email] = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'affiliation' => $user->getRoleNames()->first(),
                'role' => $user->getRoleNames()->first() == "teacher" ? "moderator" : "member",
            ];
        }

        $path = "https://gather.town/api/setEmailGuestlist";

        $headers = [
            'Content-Type'  => 'application/json',
        ];

        $body = [
            'apiKey' => env('GATHER_API_KEY', ''),
            'spaceId'  => 'Z1brs5e4jun0FRSm\lingowow',
            'guestlist' => $guestList,
        ];

        $response = Http::withHeaders($headers)->post($path, $body);

        return $response->getStatusCode() === 200 ? $response->body() : null;
    }
}
