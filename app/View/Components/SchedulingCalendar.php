<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class SchedulingCalendar extends Component
{
    
    public $schedule;
    public $mode;

    public function __construct()
    {
        $user = User::find(auth()->id());

        $this->schedule = $user->schedule;
        $this->mode = 1;
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
        $mode = $this->mode;
        return view('components.scheduling-calendar', compact('schedule','mode'));
    }
}
