<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CoursesCarousel extends Component
{

    public $loadingState = false;
    // protected $listeners = ['loadingState'];
    public $courses;

    // public function loadingState($status)
    // {
    //     $this->loadingState = $status;
    // }

    public function selectProduct($course_id)
    {
        // $this->loadingState(true);
        $this->emit('showSelectedProduct', $course_id);
    }

    public function render()
    {
        $this->courses = Course::all();

        return view('livewire.courses-carousel');
    }
}
