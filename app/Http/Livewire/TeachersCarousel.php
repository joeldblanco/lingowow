<?php

namespace App\Http\Livewire;

use App\Http\Controllers\MeetingController;
use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TeachersCarousel extends Component
{

    public $selectedTeacher = 7;
    public $loadingState = false;
    public $availableTeachers;
    public $teachers_ids;
    protected $listeners = ['loadingState'];

    public function mount($availableTeachers = null)
    {
        if ($availableTeachers == null) {
            $this->availableTeachers = new Collection([]);
            $this->availableTeachers = User::role('teacher')->get()->pluck('schedules')->flatten()->whereNotNull('selected_schedule')->pluck('user');
            $this->teachers_ids = $this->availableTeachers->pluck('id');
        } else {
            $this->teachers_ids = $availableTeachers;

            if (!is_iterable($availableTeachers)) {
                $availableTeachers = collect($availableTeachers);
            }

            $this->availableTeachers = User::role('teacher')->whereIn('id', $availableTeachers)->get()->pluck('schedules')->flatten()->whereNotNull('selected_schedule')->pluck('user');
        }

        if (count($this->availableTeachers) > 0) {
            session(['first_teacher' => $this->availableTeachers->first()->id]);
        } else {
            session()->forget('first_teacher');
        }
    }

    public function loadSchedule($teacher_id = 0)
    {
        $this->loadingState = true;
        $this->selectedTeacher = $teacher_id;
        session(['teacher_id' => $teacher_id]);
        session(['user_schedule' => json_encode([])]); //Para hacer la precarga del scheduling vacia cada vez que se recarga
        $this->emit('loadSelectingSchedule', $teacher_id);
    }

    public function loadingState($state)
    {
        $this->loadingState = $state;
    }

    public function render()
    {
        if (!is_iterable($this->teachers_ids)) {
            $this->teachers_ids = [$this->teachers_ids];
        }

        $this->availableTeachers = new Collection([]);
        $teachersSchedules = User::role('teacher')->whereIn('id', $this->teachers_ids)->get()->pluck('schedules')->flatten();

        foreach ($teachersSchedules as $schedule) {
            if (!empty($schedule->selected_schedule)) {
                $this->availableTeachers->push($schedule->user);
            }
        }

        foreach ($this->availableTeachers as $key => $teacher) {
            $request = new Request([
                'teacherId' => $teacher->id,
            ]);

            $inZoom = (new MeetingController)->getZoomUser($request);

            if (!$inZoom) {
                $this->availableTeachers->forget($key);
            }
        }

        $this->availableTeachers = $this->availableTeachers->shuffle();

        if (auth()->id() !== 5 && auth()->id() !== 6)
            $this->availableTeachers = $this->availableTeachers->filter(function ($user) {
                return $user->id !== 7;
            });

        if (count($this->availableTeachers) > 0) {
            session(['first_teacher' => $this->availableTeachers->first()->id]);
        } else {
            session()->forget('first_teacher');
        }

        return view('livewire.teachers-carousel');
    }
}
