<?php

namespace App\View\Components;

use Illuminate\View\Component;

class module extends Component
{

    public $id, $name, $descripcion;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $descripcion)
    {
        $this->id = $id;
        $this->name = $name;
        $this->descripcion = $descripcion;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.module');
    }
}
