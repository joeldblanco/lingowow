<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ShepherdTour extends Component
{
    public $tourName;
    public $role;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tourName, $role)
    {
        $this->tourName = $tourName;
        $this->role = $role;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $roleCondition = auth()->user()->roles[0]->name == $this->role;
        $tourCondition = boolval(!DB::table('shepherd_users')->where('tour_name', $this->tourName)->where('user_id', auth()->user()->id)->count());

        if ($roleCondition && $tourCondition) {
            return view('components.shepherd-tour');
        }
    }
}
