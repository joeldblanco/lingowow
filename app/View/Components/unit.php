<?php

namespace App\View\Components;

use Illuminate\View\Component;

class unit extends Component
{

    public $name, $url_slide, $url_doc, $url_audio, $name_foro, $url_foro;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $slide, $doc, $audio, $nameforo, $foro)
    {
        $this->name = $name;
        $this->url_slide = $slide;
        $this->url_doc = $doc;
        $this->url_audio = $audio;
        $this->name_foro = $nameforo;
        $this->url_foro = $foro;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.unit');
    }
}
