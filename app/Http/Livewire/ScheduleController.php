<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ScheduleController extends Component
{
    public $days = ['SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];
    public $schedule = [['13', '2'], ['13', '3'], ['13', '4']];

    public function render()
    {
        return view('livewire.schedule-controller');
    }
}
