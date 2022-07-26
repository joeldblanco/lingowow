<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notifications');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = auth()->user()->notifications->where('id', $id)->first();
        $notification->markAsRead();

        $notification_type = explode('\\', $notification->type);
        $notification_type = end($notification_type);

        $notification_data = $notification->data;
        $user = User::find($notification_data['user_id']);
        if (array_key_exists('schedule_string', $notification_data)) {
            $notification_data['schedule_string'] = str_replace('on ', '', $notification_data['schedule_string']);
        }

        switch ($notification_type) {
            case 'BookedClass':
                $notification_icon = 'fas fa-bookmark';
                $notification_data = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has booked a class ' . $notification_data['schedule_string'];
                break;

            case 'ClassRescheduled':
                $notification_icon = 'fas fa-calendar-alt';
                $notification_data = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has rescheduled a class. New schedule: ' . $notification_data['schedule_string'];
                break;

            case 'StudentUnrolment':
                $notification_icon = 'fas fa-calendar-alt';
                if (auth()->user()->roles[0]->name == 'student') {
                    $notification_data = 'You have been automatically unenroled from the course ' . $notification_data['course_name'];
                }
                break;

            case 'StudentUnrolmentToTeacher':
                $notification_icon = 'fas fa-calendar-alt';
                $notification_data = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has been automatically unenroled from course ' . $notification_data['course_name'] . ', which leaves your blocks ' . $notification_data['schedule_string'] . ' free.';
                break;

            default:
                $notification_icon = 'fas fa-bell';
                $notification_data = 'You have a new notification.';
                break;
        }

        $friends = auth()->user()->friends();

        return view('notification', compact('id','notification_icon', 'notification_data', 'friends', 'notification_type', 'notification', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
