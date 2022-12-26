<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadAudioDictation extends Component
{

    use WithFileUploads;

    public $audio_dictation = [];

    protected $listeners = ['uploadAudioDictation' => 'saveAudio'];

    public function saveAudio()
    {
        $this->validate([
            'audio_dictation.*' => 'file|max:1024', // 1MB Max
        ]);
 
        // $this->photo->store('photos');
        // dd($this->photos);
        // dd(Storage::allFiles('public/activity-dictation'), $this->audio_dictation);
        // dd($this->audio_dictation);
        foreach ($this->audio_dictation as $audio) {
            
            $audio->storeAs('activity-dictation', pathinfo($audio->path(), PATHINFO_BASENAME), 'public');
        }
        // dump($this->photos);
    }

    public function render()
    {
        return view('livewire.upload-audio-dictation'); 
    }
}
