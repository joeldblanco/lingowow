<?php

namespace App\Http\Livewire;

use App\Models\Enrolment;
use App\Models\Schedule;
use Livewire\Component;
use App\Models\User;

class ScheduledCalendar extends Component
{
    public $user_schedules;
    public $days = ['SUNDAY','MONDAY','TUESDAY', 'WEDNESDAY','THURSDAY','FRIDAY','SATURDAY'];
    public $event = "true";
    public $user_id;
    public $user_courses;
    public $user_courses_aux = [];

    protected $listeners = ['showTeacherInfo'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_id = auth()->id();
        $this->user_schedules = auth()->user()->schedules;
        if(count($this->user_schedules) > 0){
            foreach ($this->user_schedules as $key => $value) {
                $this->user_schedules[$key] = json_decode($value->selected_schedule);
                $this->user_courses[$key] = Enrolment::find($value->enrolment_id);
                if($this->user_courses[$key] != null)
                    $this->user_courses[$key] = $this->user_courses[$key]->course->course_name;
            }
        }
    }

    public function edit()
    {
        $this->dispatchBrowserEvent('contentChanged');
        // $this->event = "false";
    }

    public function showTeacherInfo($user_id){
        $this->user_id = $user_id;
    }

    public function refresh(){
        $this->user_schedules = Schedule::where('user_id', auth()->id())->get();
        // if(count($this->user_schedules) > 0){
        foreach ($this->user_schedules as $key => $value) {
            $this->user_schedules[$key] = json_decode($value->selected_schedule);
            if(auth()->user()->roles[0]->name == "student")
                $this->user_courses[$key] = Enrolment::find($value->enrolment_id)->course->course_name;
        }
        // }
        $this->edit();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->user_schedules = auth()->user()->schedules->toArray();
        foreach ($this->user_schedules as $key => $value) {
            if($value == null)
            {
                unset($this->user_schedules[$key]);
            }
        }
        
        foreach ($this->user_schedules as $key => $value) {
            $this->user_courses_aux[$this->user_courses[$key]] = $value;
        }
        // if(count($this->user_schedules) > 0){
        //     foreach ($this->user_schedules as $key => $value) {
        //         // $this->user_schedule[$key] = json_decode($value->selected_schedule);
        //         $this->user_courses[$key] = Enrolment::find($value->enrolment_id)->course->course_name;
        //     }
        // }
        return view('livewire.scheduled-calendar');
    }
}
