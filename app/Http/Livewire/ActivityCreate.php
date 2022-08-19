<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class ActivityCreate extends Component
{
    public $courses;

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function render()
    {
        return view('livewire.activity-create');
    }
}
