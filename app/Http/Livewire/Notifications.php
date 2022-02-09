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

            $temp_array = explode('\\',$value->type);
            $temp_array = $temp_array[count($temp_array)-1];
            $this->notification_type[$key] = $temp_array;

            $temp_array = json_decode($value->data);
            // dd($value);
            $user = User::find($temp_array[0]);
            $temp_array = [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'schedule_string' => $temp_array[1],
            ];

            switch ($this->notification_type[$key]) {
                case "BookedClass":
                    $this->notification_icon[$key] = "fas fa-bookmark";
                    $this->notification_data[$key] = "The student ".$temp_array['first_name']." ".$temp_array['last_name']." has booked a class ".$temp_array['schedule_string'];
                break;

                case "ClassRescheduled":
                    $this->notification_icon[$key] = "fas fa-calendar-alt";
                    $this->notification_data[$key] = "The student ".$temp_array['first_name']." ".$temp_array['last_name']." has rescheduled a class. New scheduled classes ".$temp_array['schedule_string'];
                break;

                case "ClassCanceledToStudent":
                    $this->notification_icon[$key] = "fas fa-calendar-alt";
                    $this->notification_data[$key] = "The student ".$user->first_name." ".$user->last_name." has canceled a class. Canceled class: ".$temp_array['schedule_string'];
                break;

                case "ClassCanceledToTeacher":
                    $this->notification_icon[$key] = "fas fa-calendar-times";
                    $this->notification_data[$key] = "The student ".$user->first_name." ".$user->last_name." has canceled a class. Canceled class: ".$temp_array['schedule_string'];
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
