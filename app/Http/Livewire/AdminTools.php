<?php

namespace App\Http\Livewire;

use App\Models\Enrolment;
use App\Models\User;
use Livewire\Component;

class AdminTools extends Component
{
    public $adminTools;

    public function mount()
    {
        $this->adminTools = [
            ['toolIcon' => 'fas fa-university', 'modalName' => 'enrolmentsModal'],
            ['toolIcon' => 'fas fa-users', 'modalName' => 'usersModal']
        ];
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

        return view('livewire.admin-tools', compact('enrolments', 'users'));
    }
}
