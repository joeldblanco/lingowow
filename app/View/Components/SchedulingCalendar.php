<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class SchedulingCalendar extends Component
{
    
    public $schedule;
    public $plan;

    public function __construct($plan = 0)
    {
        $user = User::find(auth()->id());

        $this->schedule = $user->schedule;
        $this->plan = $plan;
    }

    /*
     *
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $schedule = $this->schedule;
        $plan = $this->plan;
        return view('components.scheduling-calendar', compact('schedule','plan'));
    }
}
