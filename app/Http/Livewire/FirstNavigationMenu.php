<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FirstNavigationMenu extends Component
{
    public $notifications, $notification_data;

    //LIVEWIRE FUNCTION FOR GETTING LARAVEL ECHO LISTENERS//
    public function getListeners()
    {
        $user_id = auth()->user()->id;
        return [
            "echo-notification:App.Models.User.{$user_id},FriendRequest" => 'render',
        ];
    }

    public function render()
    {
        $this->notifications = DB::table('notifications')
            ->where('notifiable_id', auth()->id())
            ->select('id', 'data', 'read_at', 'type', 'created_at')
            ->limit(7)
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($this->notifications as $key => $value) {
            $data_array = json_decode($value->data, 1);

            $value->type = explode('\\', $value->type);
            $value->type = end($value->type);

            if (count($data_array) > 0) {
                $user = User::find($data_array['user_id']);
            } else {
                $user = User::find(auth()->id());
            }

            switch ($value->type) {
                case 'BookedClass':
                    // $notification_icon = 'fas fa-bookmark';
                    $this->notification_data[$key] = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has booked a class ' . $data_array['schedule_string'];
                    break;

                case 'ClassRescheduledToTeacher':
                    // $notification_icon = 'fas fa-calendar-alt';
                    $this->notification_data[$key] = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has rescheduled a class. New schedule: ' . $data_array['schedule_string'];
                    break;

                case 'StudentUnrolment':
                    // $notification_icon = 'fas fa-calendar-alt';
                    if (auth()->user()->roles[0]->name == 'student' || auth()->user()->roles[0]->name == 'guest') {
                        $this->notification_data[$key] = 'You have been automatically unenroled from the course ' . $data_array['course_name'];
                    }
                    break;

                case 'StudentUnrolmentToTeacher':
                    // $notification_icon = 'fas fa-calendar-alt';
                    $this->notification_data[$key] = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has been automatically unenroled from course ' . $data_array['schedule_string'];
                    break;

                case 'FriendRequest':
                    // $notification_icon = 'fas fa-user-friends';
                    $this->notification_data[$key] = $user->first_name . ' ' . $user->last_name . ' has sent you a friend request.';
                    break;

                case 'UpcomingClassForTeacher':
                    $this->notification_data[$key] = 'Your next class is in ' . $data_array['timeUntilClass'] . ' with student ' . $user->first_name . ' ' . $user->last_name . '.';
                    break;

                case 'UpcomingClassForStudent':
                    $this->notification_data[$key] = 'Your next class is in ' . $data_array['timeUntilClass'] . ' with teacher ' . $user->first_name . ' ' . $user->last_name . '.';
                    break;

                default:
                    // $notification_icon = 'fas fa-bell';
                    $this->notification_data[$key] = 'You have a new notification.';
                    break;
            }
        }

        return view('livewire.first-navigation-menu');
    }
}
