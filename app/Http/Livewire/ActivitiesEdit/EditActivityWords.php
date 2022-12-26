<?php

namespace App\Http\Livewire\ActivitiesEdit;

use Livewire\Component;

class EditActivityWords extends Component
{

    public $activity_content, $content;

    public function render()
    {
        return view('livewire.activities-edit.edit-activity-words');
    }
}
