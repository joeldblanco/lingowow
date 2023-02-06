<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;

class RatingForm extends Component
{

    protected $listeners = ['ratingAdded'];
    public $ratingForm = false;
    public $pendingClass;
    public $comment = "";

    public function ratingAdded($rating)
    {
        if (empty($this->comment)) {
            $this->comment = null;
        }

        Rating::create([
            'rating' => $rating,
            'class_id' => $this->pendingClass->id,
            'comment' => $this->comment,
        ]);

        $this->ratingForm = false;
    }

    public function render()
    {
        $classes = auth()
            ->user()
            ->studentClasses->where('start_date', '<', now());

        foreach ($classes as $class) {
            if (empty($class->rating) && $class->end_date < now()) {
                $this->ratingForm = true;
                $this->pendingClass = $class;
            }
        }

        return view('livewire.rating-form');
    }
}
