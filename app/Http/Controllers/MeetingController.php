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
        $attendees = User::role('student')->select('id', 'first_name', 'last_name')->orderBy('first_name', 'ASC')->get();

        return view('meetings.create', compact('hosts', 'attendees'));
    }

    public function store(Request $request, $return = false, $class = null)
    {
        $this->validate($request, [
            'topic' => 'required',
            'host_id' => 'required',
            // 'date' => 'required|date',
        ]);
        $meeting = null;

        $data = $request->all();

        $host = User::where('id', $data['host_id'])->select('id', 'email')->first();
        if (array_key_exists('attendee_id', $data)) {
            $attendee = User::where('id', $data['attendee_id'])->select('id')->first();
        } else {
            $attendee = null;
        }
        // $data['date'] = Carbon::parse($data['date'])->toIso8601ZuluString();

        // if (!$this->meetingExists($host, $attendee)) {

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
            'Authorization' => 'Bearer ' . $this->OAuth,
            'Content-Type'  => 'application/json',
        ])->post($url . $path, $body);

        $success = $response->getStatusCode() === 201;

        if ($success) {
            $data = json_decode($response->getBody(), true);

            if ($attendee != null) {
                // $meeting = Meeting::create(
                //     [
                //         'host_id' => $host['id'],
                //         'attendee_id' => $attendee['id'],
                //         'start_date' => $data['start_time'],
                //         'join_url' => $data['join_url'],
                //         'topic' => $data['topic'],
                //     ]
                // );

                $meeting = Meeting::updateOrCreate(
                    ['host_id' => $host['id'], 'attendee_id' => $attendee['id']],
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

            if ($return) {
                return $meeting->id;
            } else {
                return view('meetings.index', compact('meetings'))->with('success', 'Meeting created successfully');
            }
        } else {
            $meetings = Meeting::all();
            $error = json_decode($response->getBody(), true);
            return view('meetings.index', compact('meetings'))->with('error', $error);
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
            'Authorization' => 'Bearer ' . $this->OAuth,
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
                'Authorization' => 'Bearer ' . $this->OAuth,
                'Content-Type'  => 'application/json',
            ])->post($url . $path, $body);

            $success = $response->getStatusCode() === 201;

            if ($success) {
                $data = json_decode($response->getBody(), true);
                Meeting::updateOrInsert(
                    ['host_id' => $meeting->host->id, 'attendee_id' => $meeting->attendee->id],
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
            'Authorization' => 'Bearer ' . $this->OAuth,
            'Content-Type'  => 'application/json',
        ])->delete($url . $path, $body);

        $success = $response->getStatusCode() === 204;

        if ($success) {
            Meeting::find($meeting->id)->delete();
            $meetings = Meeting::all();
            return view('meetings.index', compact('meetings'))->with('success', 'Meeting deleted successfully');
        } else {

            $meetings = Meeting::all();
            $error = json_decode($response->getBody(), true);
            return view('meetings.index', compact('meetings'))->with('error', $error);
        }
    }

    public function meetingExists($host, $attendee = null)
    {
        // $path = 'users/' . $host['email'] . '/meetings';
        // $url = $this->retrieveZoomUrl();

        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . $this->OAuth,
        //     'Content-Type'  => 'application/json',
        // ])->get($url . $path);

        // $meetings = (json_decode($response->getBody(), true))["meetings"];

        // foreach ($meetings as $meeting) {
        //     dd($meeting);
        // }

        // return false;
        if ($attendee != null) {
            $meeting = Meeting::where('host_id', $host->id)->where('attendee_id', $attendee->id)->first();
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

        $studentMeetings = auth()->user()->studentClasses->whereBetween('start_date', [Carbon::now()->subDays(7), Carbon::now()])->pluck('meeting_id')->unique();

        // Initialize an array to store all the recordings
        $allRecordings = [];

        foreach ($studentMeetings as $meeting) {

            // Retrieve the meeting associated with the user's class
            $meeting = Meeting::find($meeting);

            // Generate the URL to retrieve the meeting instances
            $path = 'past_meetings/' . $meeting->zoom_id() . '/instances';
            $url = $this->retrieveZoomUrl();

            // Send an HTTP GET request to retrieve the meeting instances
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->OAuth,
                'Content-Type'  => 'application/json',
            ])->get($url . $path);

            // Decode the response into an array and extract each meeting instance's UUID
            $meetingInstances = json_decode($response->getBody(), true);

            // Retrieve the recording details for each meeting instance
            if (!empty($meetingInstances)) {

                foreach ($meetingInstances['meetings'] as $meetingInstanceUUID) {
                    // Generate the URL to retrieve the recording details
                    $path = 'meetings/' . urlencode(urlencode($meetingInstanceUUID['uuid'])) . '/recordings';
                    $url = $this->retrieveZoomUrl();

                    // Send an HTTP GET request to retrieve the recording details
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $this->OAuth,
                        'Content-Type'  => 'application/json',
                    ])->get($url . $path);

                    // if ($meetingInstanceUUID['uuid'] == "/1RW4NkCRJqV3T0nSqlxlw==") {
                    //     dd($response, $url, $path, $meetingInstances, $response->getStatusCode());
                    // }

                    // Decode the response into an array
                    $recordings = json_decode($response->getBody(), true);

                    // If the response is OK (200), extract the necessary information and filter based on the date
                    if (!empty($recordings) && $response->getStatusCode() == 200) {
                        $password = $recordings["password"];
                        $recordings = array_filter($recordings["recording_files"], function ($value) {
                            return Carbon::now()->diffInDays(new Carbon($value["recording_start"])) <= 7;
                        });

                        foreach ($recordings as $key => $value) {
                            $recordings[$key] = [
                                "recording_start" => (new Carbon($value["recording_start"]))->toDateTimeString(),
                                "duration" => (new Carbon($value["recording_start"]))->diffInMinutes($value["recording_end"]),
                                "play_url" => $value["play_url"],
                                "download_url" => $value["download_url"],
                                'password' => $password,
                                'recording_type' => $value['recording_type'],
                            ];
                        }
                    } else {
                        // If the response is not OK, initialize the recordings as an empty array
                        $recordings = [];
                    }

                    // Add the recordings to the array of all recordings using the recording start date as the key
                    if (!empty($value) && !empty($recordings)) $allRecordings[$value["recording_end"]] = $recordings;
                }
            }
        }

        // Filter the array of all recordings to remove empty arrays
        $allRecordings = array_filter($allRecordings);

        // Sort the array of all recordings by the recording start date
        ksort($allRecordings);


        // If the link is set, return the recordings
        if ($link) {
            return $recordings;
        }

        // Return the view with the recordings
        return view('meetings.recordings', compact('allRecordings'));
    }

    public function getZoomUser(Request $request)
    {
        $teacher = User::find($request->teacherId);
        $path = 'users/' . $teacher->email;
        $url = $this->retrieveZoomUrl();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->OAuth,
            'Content-Type'  => 'application/json',
        ])->get($url . $path);

        if ($response->getStatusCode() === 200) {
            return true;
        } else {
            return false;
        }
    }
}
