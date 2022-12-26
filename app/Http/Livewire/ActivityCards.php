<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActivityCards extends Component
{

    public $activity_content;

    public function render()
    {
        return view('livewire.activity-cards');
    }
}
