<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use App\Traits\MeetingTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function store(Request $request, $return = false)
    {
        $this->validate($request, [
            'topic' => 'required',
            'host_id' => 'required',
            'atendee_id' => 'required',
        ]);

        $data = $request->all();

        $host = User::where('id', $data['host_id'])->select('id', 'email')->first();
        $atendee = User::where('id', $data['atendee_id'])->select('id')->first();

        if (!$this->meetingExists($host, $atendee)) {

            $path = 'users/' . $host['email'] . '/meetings';
            $url = $this->retrieveZoomUrl();
            

            $body = [
                'topic'      => $data['topic'],
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
                    ['host_id' => $host['id'], 'atendee_id' => $atendee['id']],
                    ['join_url' => $data['join_url'], 'topic' => $data['topic'], 'deleted_at' => NULL]
                );

                $meetings = Meeting::all();
                $success = "Meeting created successfully";
                session(['success' => $success]);
            } else {

                $meetings = Meeting::all();
                $error = json_decode($response->getBody(), true);
                session(['error' => $error]);
            }
        } else {
            $meetings = Meeting::all();
            $error = [
                'message' => "Meeting already exists",
            ];
            session(['error' => $error]);
        }

        if ($return) {
            return $return;
        }else{
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

    public function meetingExists($host, $atendee)
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

        $meeting = Meeting::where('host_id', $host->id)->where('atendee_id', $atendee->id)->first();

        if ($meeting) {
            return true;
        } else {
            return false;
        }
    }
}
