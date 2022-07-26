<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class ScheduledCalendar extends Component
{

    public $schedule;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = User::find(auth()->id());

        $this->schedule = $user->selected_schedule;
    }

    public function edit(){
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $schedule = $this->schedule;
        return view('components.scheduled-calendar',compact('schedule'));
    }
}
