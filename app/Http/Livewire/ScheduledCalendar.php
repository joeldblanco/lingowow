<?php

namespace App\Http\Livewire;

use App\Models\Enrolment;
use App\Models\Schedule;
use Livewire\Component;
use App\Models\User;
use App\Models\ApportionmentController;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class ScheduledCalendar extends Component
{
    // public $plan = 3;
    public $role;
    public $user_schedules;
    public $teacher_id;
    public $teacher_schedule;
    public $days = ['SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];
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
        $this->role = auth()
            ->user()
            ->roles->first()->name;
        $this->user_id = auth()->id();
        $this->user_schedules = auth()->user()->schedules;
        if (count($this->user_schedules) > 0) {
            foreach ($this->user_schedules as $key => $value) {
                $this->user_schedules[$key] = json_decode($value->selected_schedule);
                $this->user_courses[$key] = Enrolment::find($value->enrolment_id);
                if ($this->user_courses[$key] != null)
                    $this->user_courses[$key] = $this->user_courses[$key]->course->course_name;
            }
        }
        //$this->teacher_id = Enrolment::select("teacher_id")
        //->where("student_id", $this->user_id);
        $this->teacher_id = Enrolment::select("teacher_id")
            ->where("student_id", $this->user_id)->first();

        if($this->teacher_id != null && $this->role == "student"){
            $this->teacher_id = $this->teacher_id->teacher_id;
        } else {
            $this->teacher_id = $this->user_id;
        } 
        //dd($this->teacher_id);
        if ($this->teacher_id != null) {
            $this->teacher_schedule = User::find($this->teacher_id)->schedules;

            foreach ($this->teacher_schedule as $key => $value) {
                $this->teacher_schedule[$key] = json_decode($value->selected_schedule);
            }

            if(!$this->teacher_schedule->first()) $this->teacher_schedule = [];
    
            if (count($this->teacher_schedule) > 0) $this->teacher_schedule = json_decode(json_encode($this->teacher_schedule[0]), 1); 
        }
        


        
        //array_merge($this->user_schedules);
        $this->user_schedules = $this->user_schedules->first();
        

        //  dd($this->user_schedules);
    }

    public function edit()
    {
        $this->dispatchBrowserEvent('contentChanged');
        // $this->event = "false";
    }

    public function showTeacherInfo($user_id)
    {
        $this->user_id = $user_id;
    }

    public function refresh()
    {
        $this->user_schedules = Schedule::where('user_id', auth()->id())->get();
        // if(count($this->user_schedules) > 0){
        foreach ($this->user_schedules as $key => $value) {
            $this->user_schedules[$key] = json_decode($value->selected_schedule);
            if (auth()->user()->roles[0]->name == "student")
                $this->user_courses[$key] = Enrolment::find($value->enrolment_id)->course->course_name;
        }
        // }

        $this->teacher_id = Enrolment::select("teacher_id")
            ->where("student_id", $this->user_id)->first();
            
            if($this->teacher_id != null && $this->role == "student"){
                $this->teacher_id = $this->teacher_id->teacher_id;
            } else {
                $this->teacher_id = $this->user_id;
            } 

            if ($this->teacher_id != null) {
        $this->teacher_schedule = User::find($this->teacher_id)->schedules;

        foreach ($this->teacher_schedule as $key => $value) {
            $this->teacher_schedule[$key] = json_decode($value->selected_schedule);
        }

        if (count($this->teacher_schedule) > 0) $this->teacher_schedule = json_decode(json_encode($this->teacher_schedule[0]), 1);
        }
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
        if (count($this->user_schedules) > 0) $this->user_schedules = json_decode(json_encode($this->user_schedules[0]), 1);
        // dd($this->user_courses);
        if ($this->user_schedules == null) $this->user_schedules = [];
        foreach ($this->user_schedules as $key => $value) {
            if ($value == null) {
                unset($this->user_schedules[$key]);
            }
        }
        // dd($this->teacher_id);
        $this->teacher_schedule = $this->teacher_schedule;
        //if (count($this->teacher_schedule) > 0) $this->teacher_schedule = json_decode(json_encode($this->teacher_schedule[0]), 1);
        // foreach ($this->user_schedules as $key => $value) {
        //     $this->user_courses_aux[$this->user_courses[$key]] = $value;
        // }
        // if(count($this->user_schedules) > 0){
        //     foreach ($this->user_schedules as $key => $value) {
        //         // $this->user_schedule[$key] = json_decode($value->selected_schedule);
        //         $this->user_courses[$key] = Enrolment::find($value->enrolment_id)->course->course_name;
        //     }
        // }
        
        return view('livewire.scheduled-calendar');
    }
}
