<?php

namespace App\View\Components;

use Illuminate\View\Component;

class course_card extends Component
{
    public $id,$name,$image;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$name,$image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        // $this->url_image = $url_image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.course-card');
    }
}
