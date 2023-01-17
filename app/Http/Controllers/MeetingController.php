<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use App\Traits\MeetingTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MeetingController extends Controller
{
    use MeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function index()
    {
        $meetings = Meeting::all();

        return view('meetings.index', compact('meetings'));
    }

    public function show(Meeting $meeting)
    {
        return redirect($meeting->join_url);
    }

    public function create()
    {
        $hosts = User::role('teacher')->select('id', 'first_name', 'last_name')->orderBy('first_name', 'ASC')->get();
        $atendees = User::role('student')->select('id', 'first_name', 'last_name')->orderBy('first_name', 'ASC')->get();

        return view('meetings.create', compact('hosts', 'atendees'));
    }

    public function store(Request $request, $return = false, $class = null)
    {
        $this->validate($request, [
            'topic' => 'required',
            'host_id' => 'required',
            // 'date' => 'required|date',
        ]);

        $data = $request->all();

        $host = User::where('id', $data['host_id'])->select('id', 'email')->first();
        if (array_key_exists('atendee_id', $data)) {
            $atendee = User::where('id', $data['atendee_id'])->select('id')->first();
        } else {
            $atendee = null;
        }
        // $data['date'] = Carbon::parse($data['date'])->toIso8601ZuluString();

        // if (!$this->meetingExists($host, $atendee)) {

        $path = 'users/' . $host['email'] . '/meetings';
        $url = $this->retrieveZoomUrl();

        $body = [
            'topic'      => $data['topic'],
            'type'       => self::MEETING_TYPE_RECURRING,
            // 'duration'  => 40,
            // 'start_time' => $data['date'],
            // 'timezone'  => 'UTC',
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->jwt,
            'Content-Type'  => 'application/json',
        ])->post($url . $path, $body);

        $success = $response->getStatusCode() === 201;

        if ($success) {
            $data = json_decode($response->getBody(), true);

            if ($atendee != null) {
                // $meeting = Meeting::create(
                //     [
                //         'host_id' => $host['id'],
                //         'atendee_id' => $atendee['id'],
                //         'start_date' => $data['start_time'],
                //         'join_url' => $data['join_url'],
                //         'topic' => $data['topic'],
                //     ]
                // );

                $meeting = Meeting::updateOrCreate(
                    ['host_id' => $host['id'], 'atendee_id' => $atendee['id']],
                    ['join_url' => $data['join_url'], 'topic' => $data['topic'], 'deleted_at' => NULL]
                );

                // $class->meeting_id = $meeting->id;
                // $class->save();
            } else {
                $meeting = Meeting::create(
                    [
                        'host_id' => $host['id'],
                        'start_date' => $data['start_time'],
                        'join_url' => $data['join_url'],
                        'topic' => $data['topic'],
                    ]
                );

                // $class->meeting_id = $meeting->id;
                // $class->save();
            }

            $meetings = Meeting::all();
            $success = "Meeting created successfully";
            session(['success' => $success]);
        } else {
            $meetings = Meeting::all();
            $error = json_decode($response->getBody(), true);
            session(['error' => $error]);
        }


        // } else {
        //     $meetings = Meeting::all();
        //     $error = [
        //         'message' => "Meeting already exists",
        //     ];
        //     session(['error' => $error]);
        // }

        if ($return) {
            return $meeting->id;
        } else {
            return view('meetings.index', compact('meetings'));
        }
    }

    public function edit(Meeting $meeting)
    {
        $hosts = User::role('teacher')->select('id', 'first_name', 'last_name')->orderBy('first_name', 'ASC')->get();

        return view('meetings.edit', compact('meeting', 'hosts'));
    }

    public function update(Meeting $meeting, Request $request)
    {
        $data = $request->all();

        $path = 'meetings/' . $meeting->zoom_id();
        $url = $this->retrieveZoomUrl();
        $host = User::where('id', $data['host_id'])->select('id', 'email')->first();

        $body = [];
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->jwt,
            'Content-Type'  => 'application/json',
        ])->delete($url . $path, $body);
        $success = $response->getStatusCode() === 204;

        if ($success) {

            $path = 'users/' . $host['email'] . '/meetings';
            $url = $this->retrieveZoomUrl();

            $body = [
                'topic'      => $meeting->topic,
                'type'       => self::MEETING_TYPE_RECURRING,
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->jwt,
                'Content-Type'  => 'application/json',
            ])->post($url . $path, $body);

            $success = $response->getStatusCode() === 201;

            if ($success) {
                $data = json_decode($response->getBody(), true);
                Meeting::updateOrInsert(
                    ['host_id' => $meeting->host->id, 'atendee_id' => $meeting->atendee->id],
                    ['host_id' => $host['id'], 'join_url' => $data['join_url'], 'deleted_at' => NULL]
                );

                $meetings = Meeting::all();
                $success = "Meeting updated successfully";
                session(['success' => $success]);
                return view('meetings.index', compact('meetings'));
            } else {

                $meetings = Meeting::all();
                $error = json_decode($response->getBody(), true);
                session(['error' => $error]);
                return view('meetings.index', compact('meetings'));
            }
        } else {
            session(['error' => 'Error updating meeting']);
        }

        return redirect()->route('meetings.index');
    }

    public function destroy(Meeting $meeting)
    {
        $path = 'meetings/' . $meeting->zoom_id();
        $url = $this->retrieveZoomUrl();

        $body = [];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->jwt,
            'Content-Type'  => 'application/json',
        ])->delete($url . $path, $body);

        $success = $response->getStatusCode() === 204;

        if ($success) {
            Meeting::find($meeting->id)->delete();
            $meetings = Meeting::all();
            $success = "Meeting deleted successfully";
            session(['success' => $success]);
            return view('meetings.index', compact('meetings'));
        } else {

            $meetings = Meeting::all();
            $error = json_decode($response->getBody(), true);
            session(['error' => $error]);
            return view('meetings.index', compact('meetings'));
        }
    }

    public function meetingExists($host, $atendee = null)
    {
        // $path = 'users/' . $host['email'] . '/meetings';
        // $url = $this->retrieveZoomUrl();

        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . $this->jwt,
        //     'Content-Type'  => 'application/json',
        // ])->get($url . $path);

        // $meetings = (json_decode($response->getBody(), true))["meetings"];

        // foreach ($meetings as $meeting) {
        //     dd($meeting);
        // }

        // return false;
        if ($atendee != null) {
            $meeting = Meeting::where('host_id', $host->id)->where('atendee_id', $atendee->id)->first();
        } else {
            $meeting = Meeting::where('host_id', $host->id)->first();
        }

        if ($meeting) {
            return true;
        } else {
            return false;
        }
    }

    public function getRecordings($link = false)
    {
        $meetings = Meeting::find(auth()->user()->studentClasses->pluck('meeting_id')->unique()->toArray());
        $recordings = [];
        foreach ($meetings as $meeting) {
            $path = 'meetings/' . $meeting->zoom_id() . '/recordings';
            $url = $this->retrieveZoomUrl();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->jwt,
                'Content-Type'  => 'application/json',
            ])->get($url . $path);
            $recordings = json_decode($response->getBody(), true);
            if ($response->getStatusCode() == 200) {
                $password = $recordings["password"];
                $recordings = $recordings["recording_files"];
                foreach ($recordings as $key => $value) {
                    $recordings[$key] = [
                        "recording_start" => $value["recording_start"],
                        "duration" => (new Carbon($value["recording_start"]))->diffInMinutes($value["recording_end"]),
                        "play_url" => $value["play_url"],
                        'password' => $password,
                    ];
                }
            } else {
                $recordings = [];
            }
        }

        if ($link) {
            return $recordings;
        }

        return view('meetings.recordings', compact('recordings'));
    }
}
