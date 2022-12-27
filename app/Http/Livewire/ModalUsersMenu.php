<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\ActivityUser;
use App\Models\Enrolment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ModalUsersMenu extends Component
{

    protected $listeners = ['display-modal' => 'modalShow', 'set_id_activity', 'set_id_student', 'modalShowConfirm', 'modalShowDelete', 'assignStudentActivity', 'refresh'];
    public $showModalMenuUsers = false;
    public $showModalConfirm = false;
    public $showModalDelete = false;
    public $activity = [];
    public $id_ac;
    public $id_st;
    public $student_assign = [];
    public $students = [];
    public $name = "";
    public $user;


    public function modalShow()
    {
        $this->showModalMenuUsers = !$this->showModalMenuUsers;
    }

    public function modalShowConfirm()
    {
        $this->showModalConfirm = !$this->showModalConfirm;
    }

    public function modalShowDelete()
    {
        $this->showModalDelete = !$this->showModalDelete;
    }

    public function mount()
    {

        $this->user = auth()->user();

        // dd($user->enrolments_teacher);

        // $model_roles = DB::table('model_has_roles')->select('role_id', 'model_id')->get();
        // foreach ($model_roles as $model_role) {

        //     if ($model_role->role_id == 2) {
        //         $students[] = $model_role->model_id;
        //     }
        // }
        if (auth()->user()->getRoleNames()->first() == 'admin') {
            $this->students = User::role('student')->orderBy("first_name");
        } else {
            foreach ($this->user->enrolments_teacher as $key => $teacher) {
                $students[] = $teacher->student_id;
            }

            $this->students = User::find($students)->sortBy("first_name");
        }


        // dd($this->students);
        $this->activity = Activity::first();
        $this->student_assign = User::first();
        // $this->students = User::all();
    }

    public function set_id_activity($id)
    {
        // dd($id);
        $this->activity = Activity::find($id);
        $this->id_ac = $id;
        // dd($this->activity);
    }

    public function set_id_student($id)
    {
        // dd($id);
        $this->student_assign = User::find($id);
        $this->id_st = $id;
        // dd($this->student);
    }

    public function assignStudentActivity()
    {

        // dd($this->id_ac, $this->id_st);
        $assign = new ActivityUser();
        $assign->activity_id = $this->id_ac;
        $assign->user_id = $this->id_st;
        $assign->user_type = 1;
        $assign->save();

        $activities = Activity::all();
        // dd($activities->first()->unit->group->module->course);
        return redirect()->route('activities.index');
    }

    public function refresh()
    {
        $model_roles = DB::table('model_has_roles')->select('role_id', 'model_id')->get();
        foreach ($model_roles as $model_role) {

            if ($model_role->role_id == 2) {
                $students[] = $model_role->model_id;
            }
        }
        if ($this->name == "") {
            $this->students = User::find($students)->sortBy("first_name");
        } else {
            $this->students = User::find($students)->where("first_name", 'like', '%' . $this->name . '%')->sortBy("first_name");
        }

        // dd($this->students);
    }

    public function render()
    {
        // dd(User::role('student')->get());

        if (auth()->user()->getRoleNames()->first() == 'admin') {

            $students = User::role('student')->get()->pluck('id');
            $this->students = User::role('student')->where(function ($query) {
                $query->where(DB::raw("CONCAT(first_name,' ',last_name)"), 'like', '%' . $this->name . '%')->orWhere("last_name", 'like', '%' . $this->name . '%');
            })->orderBy("first_name")->get();

        } else {

            $students = $this->user->enrolments_teacher->pluck('student_id')->toArray();

            $this->students = User::role('student')->where(function ($query) use ($students) {
                $query->where(DB::raw("CONCAT(first_name,' ',last_name)"), 'like', '%' . $this->name . '%')->whereIn('id', $students);
            })->orderBy("first_name")->get();
        }
        // dd($this->students);
        return view('livewire.modal-users-menu');
    }
}
