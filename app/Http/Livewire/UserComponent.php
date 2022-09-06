<?php

namespace App\Http\Livewire;

use App\Models\Enrolment;
use App\Models\User;
use Livewire\Component;

class UserComponent extends Component
{
    public $user, $role;
    public $students = [];

    public function mount($user, int $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function show()
    {
        if ($this->role == 3) {
            $enrolments = Enrolment::where('teacher_id', $this->user->id)->select('student_id', 'course_id')->get()->toArray();
            foreach ($enrolments as $key => $value) {
                $enrolments[$key] = array($value['student_id'], $value['course_id']);
            }

            foreach ($enrolments as $key => $value) {
                $this->students[$key] = $value[0];
            }
            $this->students = User::find($this->students);
        }
    }

    public function render()
    {
        return view('livewire.user-component');
    }
}
