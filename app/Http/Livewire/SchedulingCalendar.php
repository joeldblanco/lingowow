<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SchedulingCalendar extends Component
{
    
    public $schedule;
    public $plan;
    protected $listeners = ['loadSchedule'];

    public function __construct($plan = 0)
    {
        // $user = User::find(auth()->id());

        $this->schedule = json_decode(User::find(session('first_teacher'))->schedules[0]->selected_schedule);
        // echo session('first_teacher');
        $this->plan = $plan;
    }

    public function loadSchedule($teacher_id)
    {
        $this->schedule = json_decode(User::find($teacher_id)->schedules[0]->selected_schedule);
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
