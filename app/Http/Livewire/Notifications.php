<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Notifications extends Component
{
    public $notifications, $notification_id, $notification_type, $notification_data, $notification_created_at, $notification_read_at, $notification_icon;
    // public $headings = ["Notification Type","Schedule","Read At"];

    public function mount()
    {
        $this->notifications = DB::table('notifications')
                                ->where('notifiable_id',auth()->id())
                                ->select('id','type','data','read_at','created_at')
                                ->get();
        
        foreach ($this->notifications as $key => $value) {

            $data_array = explode('\\',$value->type);
            $data_array = $data_array[count($data_array)-1];
            $this->notification_type[$key] = $data_array;

            $data_array = json_decode($value->data, 1);
            // dd($data_array);
            $user = User::find($data_array["user_id"]);
            // $data_array = [
            //     'first_name' => $user->first_name,
            //     'last_name' => $user->last_name,
            //     'schedule_string' => $data_array['schedule_string'],
            // ];
            // dd($data_array);

            switch ($this->notification_type[$key]) {
                case "BookedClass":
                    $this->notification_icon[$key] = "fas fa-bookmark";
                    $this->notification_data[$key] = "The student ".$user->first_name." ".$user->last_name." has booked a class ".$data_array['schedule_string'];
                break;

                case "ClassRescheduled":
                    $this->notification_icon[$key] = "fas fa-calendar-alt";
                    $this->notification_data[$key] = "The student ".$user->first_name." ".$user->last_name." has rescheduled a class. New scheduled classes ".$data_array['schedule_string'];
                break;

                case "StudentUnrolment":
                    $this->notification_icon[$key] = "fas fa-calendar-alt";
                    if(auth()->user()->roles[0]->name == "student"){
                        $this->notification_data[$key] = "You have been automatically unenroled from the course ".$data_array['course_name'];
                    }
                break;

                case "StudentUnrolmentToTeacher":
                    $this->notification_icon[$key] = "fas fa-calendar-times";
                    $this->notification_data[$key] = "The student ".$user->first_name." ".$user->last_name." has been automatically unenroled from the course ". $data_array['course_name'] .', which leaves your blocks '.$data_array['schedule_string'].' free.';
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
    }

    public function showNotification($notification_id)
    {
        // DB::table('notifications')
        // ->where('id',$notification_id)
        // ->update(['read_at' => now()]);

        redirect()->route('notifications.show',$notification_id);
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
