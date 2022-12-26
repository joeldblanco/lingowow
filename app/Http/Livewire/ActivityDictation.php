<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActivityDictation extends Component
{

    public $activity_content;
    public $num_content;

    public function render()
    {
        return view('livewire.activity-dictation');
    }
}
