<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SchedulingCalendar extends Component
{
    
    public $schedule, $teacher_id;
    public $plan;
    protected $listeners = ['loadSchedule'];

    public function __construct($plan = 0)
    {
        // $user = User::find(auth()->id());
        $this->teacher_id = 248;
        $this->schedule = json_decode(User::find($this->teacher_id)->schedules[0]->selected_schedule);
        // echo session('first_teacher');
        $this->plan = $plan;
    }

    public function loadSchedule($teacher_id)
    {
        $this->teacher_id = $teacher_id;
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
        return view('components.scheduling-calendar');
    }
}
