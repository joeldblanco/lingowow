<?php

namespace App\Http\Livewire;

use App\Models\Enrolment;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class UsersTable extends Component
{
    public $role;
    public $users = [];
    private $models;
    public $selected_teacher;
    public $days = ['SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];
    public $user_schedule;
    public $students = [];
    public $students_schedules = [];
    public $username, $password, $password_confirm, $first_name, $last_name, $email, $user_role;
    public $showUserInfo = false;
    public $current_user = null;

    public function mount()
    {
        $this->selected_teacher = User::find(5);
        $this->user_role = 1;
        // $this->role = 2;
        // $this->user_schedule = [];

    }

    public function showInfo($teacher_id)
    {
        $enrolments = Enrolment::where('teacher_id', $teacher_id)->select('student_id', 'course_id')->get();
        foreach ($enrolments as $key => $value) {
            $enrolments[$key] = array($value->student_id, $value->course_id);
        }
        $this->selected_teacher = User::find($teacher_id);
        // $this->emit('showTeacherInfo');
        $this->showUserInfo = true;
    }

    public function selectRole($role)
    {
        // $this->role = $role;
        redirect()->route('admin.users', $role);
    }

    public function createUser()
    {
        if (($this->password != "" && $this->password_confirm != "") && ($this->password != null && $this->password_confirm != null) && ($this->password == $this->password_confirm)) {
            $user = User::withTrashed()->where('username', $this->username)->first();
            if ($user != null && $user->count() > 0 && $user->trashed()) {
                $user->restore();
            } else {
                $user = new User;
                $user->username = $this->username;
                $user->password = Hash::make($this->password);
                $user->first_name = $this->first_name;
                $user->last_name = $this->last_name;
                $user->email = $this->email;
                $user->save();
                $user->assignRole($this->user_role);
                $user->schedules()->create([
                    'selected_schedule' => NULL,
                    'user_id' => $user->id,
                    'enrolment_id' => NULL,
                ]);
            }
        }
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

    public function render()
    {
        $this->models = DB::table('model_has_roles')->select('model_id')->where('role_id', $this->role)->get();

        $this->users = [];
        foreach ($this->models as $model) {
            $this->users[] = $model->model_id;
        }
        $this->models = User::whereIn('id',$this->users)->paginate(20);
        $models = $this->models;

        if ($this->selected_teacher != null) {

            $this->user_schedule = Schedule::select("selected_schedule")->where('user_id', $this->selected_teacher->id)->get();
            if ($this->user_schedule && (count($this->user_schedule) > 0)) {
                $this->user_schedule = json_decode($this->user_schedule[0]->selected_schedule);
            } else {
                $this->user_schedule = [];
            }
        }

        $scheduled_classes = Enrolment::select('student_id')->where('teacher_id', $this->selected_teacher->id)->get();
        $temp_student_schedule = [];
        $student_schedule = [];
        $this->students = [];
        foreach ($scheduled_classes as $key => $value) {
            $this->students[$key] = $value->student_id;
        }
        // if(count($this->students) > 0){
        $this->students = User::find($this->students);
        // }

        foreach ($this->students as $key => $value) {
            $this->students[$key][1] = Schedule::select('selected_schedule')->where('user_id', $value->id)->get();
            $this->students[$key][1] = json_decode($this->students[$key][1][0]->selected_schedule);
        }

        for ($i = 0; $i < count($scheduled_classes); $i++) {
            array_push($temp_student_schedule, Schedule::select('selected_schedule')->where('user_id', $scheduled_classes[$i]->student_id)->get());
            if ($temp_student_schedule[$i][0]->selected_schedule)
                array_push($student_schedule, json_decode($temp_student_schedule[$i][0]->selected_schedule));
        }

        if (!empty(array_filter($student_schedule, function ($a) {
            return $a !== null;
        }))) {
            $student_schedule = array_merge(...$student_schedule);
        }

        $this->students_schedules = [];
        foreach ($this->students as $student) {
            $this->students_schedules[] = $student[1];
        }
        $this->students_schedules = array_merge(...$this->students_schedules);

        $role =  Auth::user()->roles[0]->name;

        return view('livewire.users-table', ['models' => $models]);
    }
}
