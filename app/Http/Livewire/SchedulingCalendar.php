<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SchedulingCalendar extends Component
{
    
    public $schedule, $teacher_id;
    public $plan;
    public $event = "true";
    protected $listeners = ['loadSchedule'];
    public $name;
    // public $apport;

    public function mount($plan = 0)
    {
        // $user = User::find(auth()->id());
        $this->teacher_id = session('first_teacher');
        $this->schedule = json_decode(User::find($this->teacher_id)->schedules[0]->selected_schedule);
        // echo session('first_teacher');
        $this->plan = $plan;

        $this->schedule = [];
    }

    /*public function dehydrate()
    {
        $this->dispatchBrowserEvent("initSchedule");
    }*/

    public function loadSchedule($teacher_id)
    {
        $this->teacher_id = $teacher_id;
        $this->name = User::find($this->teacher_id)->first_name." ".User::find($this->teacher_id)->last_name;
        //dd($this->name);
        $this->schedule = json_decode(User::find($this->teacher_id)->schedules[0]->selected_schedule);
        // dd($this->schedule);
        if($this->schedule == null) $this->schedule = [];
        $this->emit('loadingState', false);
    }

    /*
     *
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        //$this->dispatchBrowserEvent("initSchedule");
        // dd($this->apport);
        return view('components.scheduling-calendar');
    }
}
