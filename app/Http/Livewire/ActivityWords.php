<?php

namespace App\Http\Livewire;

use Livewire\Component;



class ActivityWords extends Component
{

    public $activity_content;

    public function render()
    {
        return view('livewire.activity-words');
    }
}
