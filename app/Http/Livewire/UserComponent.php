<?php

namespace App\Http\Livewire;

use App\Models\Enrolment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    public function editUser($id)
    {
        $this->current_user = User::find($id);

        $this->username = $this->current_user->username;
        $this->password = "";
        $this->password_confirm = "";
        $this->first_name = $this->current_user->first_name;
        $this->last_name = $this->current_user->last_name;
        $this->email = $this->current_user->email;
        $this->user_role = $this->current_user->roles[0]->id;
    }

    public function updateUser()
    {
        $user = User::withTrashed()->where('username', $this->username)->first();
        if ($user != null && $user->count() > 0 && $user->trashed()) {
            $user->restore();
        }
        $user->username = $this->username;
        if (($this->password != "" && $this->password_confirm != "") && ($this->password != null && $this->password_confirm != null) && ($this->password == $this->password_confirm)) {
            $user->password = Hash::make($this->password);
        }
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->removeRole($user->roles[0]->id);
        $user->assignRole($this->user_role);
        $user->save();
    }

    public function deleteUser()
    {
        $user = User::withTrashed()->where('username', $this->username)->first();
        $user->delete();
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
