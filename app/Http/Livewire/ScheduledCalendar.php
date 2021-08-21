<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ScheduledCalendar extends Component
{
    public $schedule;
    public $mode = 0;
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

    public function edit($mode){
        $this->mode = $mode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $schedule = $this->schedule;
        $mode = $this->mode;
        return view('livewire.scheduled-calendar',compact('schedule','mode'));
    }
}
