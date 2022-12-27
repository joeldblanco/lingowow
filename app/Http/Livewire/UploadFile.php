<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFile extends Component
{


    use WithFileUploads;

    public $photos = [];

    protected $listeners = ['uploadImage' => 'save'];

    public function save()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
 
        // $this->photo->store('photos');
        // dd($this->photos);
        foreach ($this->photos as $photo) {
            // dd($photo, explode("/",$photo->path())[1], pathinfo($photo->path(), PATHINFO_BASENAME));
            // dd($photo);
            // $name = $photo->getClientOriginalName();
            // $photo->store('Activity', 'public');
            $photo->storeAs('activity-cards', pathinfo($photo->path(), PATHINFO_BASENAME), 'public');
        }
        // dump($this->photos);
    }

    public function render()
    {
        return view('livewire.upload-file');
    }
}
