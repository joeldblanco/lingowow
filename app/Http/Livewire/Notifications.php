<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Notifications extends Component
{
    use WithPagination;
    public $notifications, $notification_id, $notification_type, $notification_data, $notification_created_at, $notification_read_at, $notification_icon;
    public $perPage, $currentPage;

    public function mount($perPage = 10, $currentPage = 1)
    {
        $this->perPage = $perPage;
        $this->currentPage = $currentPage;

        $this->notifications = auth()->user()->notifications;

        foreach ($this->notifications as $key => $value) {

            $data_array = explode('\\', $value->type);
            $data_array = $data_array[count($data_array) - 1];
            $this->notification_type[$key] = $data_array;

            $data_array = $value->data;
            $user = User::find($data_array["user_id"]);

            switch ($this->notification_type[$key]) {
                case "BookedClass":
                    $this->notification_icon[$key] = "fas fa-bookmark";
                    $this->notification_data[$key] = "The student " . $user->first_name . " " . $user->last_name . " has booked a class " . $data_array['schedule_string'];
                    break;

                case "ClassRescheduledToTeacher":
                    $this->notification_icon[$key] = "fas fa-calendar-alt";
                    $this->notification_data[$key] = "The student " . $user->first_name . " " . $user->last_name . " has rescheduled a class. New scheduled classes " . $data_array['schedule_string'];
                    break;

                case "StudentUnrolment":
                    $this->notification_icon[$key] = "fas fa-calendar-alt";
                    if (auth()->user()->roles[0]->name == "student") {
                        $this->notification_data[$key] = "You have been automatically unenroled from the course " . $data_array['course_name'];
                    }
                    break;

                case "StudentUnrolmentToTeacher":
                    $this->notification_icon[$key] = "fas fa-calendar-times";
                    $this->notification_data[$key] = "The student " . $user->first_name . " " . $user->last_name . " has been automatically unenroled from the course " . $data_array['course_name'] . ', which leaves your blocks ' . $data_array['schedule_string'] . ' free.';
                    break;

                case 'FriendRequest':
                    $this->notification_icon[$key] = 'fas fa-user-friends';
                    $this->notification_data[$key] = $user->first_name . ' ' . $user->last_name . ' has sent you a friend request.';
                    break;

                case 'UpcomingClassForStudent':
                    $this->notification_icon[$key] = 'fas fa-chalkboard-teacher';
                    $this->notification_data[$key] = 'Your next class is in ' . $data_array['timeUntilClass'] . ' with teacher ' . $user->first_name . ' ' . $user->last_name . '.';
                    break;

                case 'UpcomingClassForTeacher':
                    $this->notification_icon[$key] = 'fas fa-chalkboard-teacher';
                    $this->notification_data[$key] = 'Your next class is in ' . $data_array['timeUntilClass'] . ' with student ' . $user->first_name . ' ' . $user->last_name . '.';
                    break;

                default:
                    $this->notification_icon[$key] = "fas fa-bell";
                    $this->notification_data[$key] = "You have a new notification.";
                    break;
            }

            $this->notification_read_at[$key] = $value->read_at;

            $this->notification_created_at[$key] = new Carbon($value->created_at);
            $this->notification_created_at[$key] = $this->notification_created_at[$key]->diffForHumans();

            $this->notification_id[$key] = $value->id;
        }
        $this->resetPage();
    }

    public function showNotification($notification_id)
    {
        redirect()->route('notifications.show', $notification_id);
    }

    public function render()
    {
        $this->notifications = new Collection($this->notifications);
        $paginatedNotifications = new LengthAwarePaginator(
            $this->notifications->forPage($this->currentPage, $this->perPage),
            $this->notifications->count(),
            $this->perPage,
            $this->currentPage,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        return view('livewire.notifications', ['paginatedNotifications' => $paginatedNotifications]);
    }
}
