<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Enrolment;
use App\Models\User;
use Livewire\Component;

class AdminTools extends Component
{
    public $adminTools;
    public $unitToAssociate;
    public $studentToAssociate;
    public $success = false;
    public $error = false;
    public $message;
    public $unitUsersModal = false;

    protected $rules = [
        'studentToAssociate' => 'required',
    ];

    public function mount()
    {
        $this->adminTools = [
            ['toolIcon' => 'fas fa-university', 'modalName' => 'enrolmentsModal'],
            ['toolIcon' => 'fas fa-graduation-cap', 'modalName' => 'unitsUsersModal'],
            ['toolIcon' => 'fas fa-users', 'modalName' => 'usersModal'],
        ];
    }

    public function assignUnitToStudent()
    {
        // Detach user from all units
        User::find($this->studentToAssociate)->units()->detach();

        // Attach the user to the unit
        User::find($this->studentToAssociate)->units()->attach($this->unitToAssociate);

        $this->success = true;
        $this->message = 'Unit assigned to student successfully!';

        $this->unitToAssociate = null;
        $this->studentToAssociate = null;
        $this->unitUsersModal = false;
    }

    public function render()
    {
        $enrolments = Enrolment::orderBy('updated_at', 'desc')->paginate(50);
        $users = User::withTrashed()
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.model_type', User::class)
            ->orderBy('roles.id', 'desc')
            ->orderBy('first_name')
            ->select('users.*')
            ->get();
        $courses = Course::all();
        $students = User::role('student')->orderBy('first_name')->get();

        if (empty($this->studentToAssociate)) {
            $this->studentToAssociate = User::role('student')->orderBy('first_name')->first();

            if (!empty($this->studentToAssociate)) {
                if (count($this->studentToAssociate->units)) {
                    $this->studentToAssociate = $this->studentToAssociate->units->first()->id;
                }
            }
        }

        if (empty($this->unitToAssociate))
            $this->unitToAssociate = Course::first()->modules->sortBy('order')->first()->units->where('order', '%', 2)->sortBy('order')->first()->id;

        return view('livewire.admin-tools', compact('enrolments', 'users', 'courses', 'students'));
    }
}
