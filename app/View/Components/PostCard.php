<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostCard extends Component
{

    public $size;
    public $author;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($size = "6", $author = "The Utterers' Corner")
    {
        $this->size = $size;
        $this->author = $author;

        if($author == "")
            $this->author = "The Utterers' Corner";

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-card');
    }
}
