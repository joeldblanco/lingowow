<?php

namespace App\Http\Livewire;

use App\Http\Controllers\GatherController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UsersTableComponent extends Component
{

    public $search;
    public $users;
    // public $searchCriterium = 'FIRST NAME';
    public $sort = 'FIRST NAME';
    public $direction = 'asc';
    public $username, $password, $password_confirm, $first_name, $last_name, $email, $user_id;
    public $selectedRows = [];
    public $selectedRowsLenght;
    public $role, $roles;
    public $editUser = false;
    protected $listeners = ['selectRows'];

    protected $rules = [
        'username' => 'required',
        // 'password' => 'required',
        // 'password_confirm' => 'required|same:password',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'role' => 'required|integer|min:1|max:4',
    ];

    public $searchCriteria = [
        'username' => 'USERNAME',
        'first_name' => 'FIRST NAME',
        'last_name' => 'LAST NAME',
        'email' => 'EMAIL',
        'role' => 'ROLE',
        'status' => 'STATUS'
    ];

    public $headings = [
        'userUsername' => 'USERNAME',
        'userFirstName' => 'FIRST NAME',
        'userLastName' => 'LAST NAME',
        'userEmail' => 'EMAIL',
        'userRole' => 'ROLE',
        'userStatus' => 'STATUS'
    ];

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
        }
    }

    public function create()
    {
        $this->validate();

        if ($this->password === $this->password_confirm) {
            $user = User::withTrashed()->where('username', $this->username);
            if ($user->count() > 0) {
                $user->restore();
            } else {
                $user = new User;
                $user->username = $this->username;
                $user->password = Hash::make($this->password);
                $user->first_name = $this->first_name;
                $user->last_name = $this->last_name;
                $user->email = $this->email;
                $user->save();

                $user->assignRole('guest');
            }
        }

        GatherController::setGuestsList();

        $this->editUser = false;
    }

    public function update()
    {
        $this->validate();

        $user = User::withTrashed()
            ->find($this->user_id);
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        if (($this->password != "") && ($this->password === $this->password_confirm)) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        if ($user->roles->count())
            $user->removeRole($user->roles[0]->id);
        $user->assignRole($this->role);

        GatherController::setGuestsList();

        $this->editUser = false;
        // $this->reset(['search','users','sort','direction','username','password','password_confirm','first_name','last_name','email','user_id','selectedRows','selectedRowsLenght','role','roles']);
    }

    public function selectRows($rows)
    {
        $this->selectedRows = $rows;
    }

    public function delete()
    {
        foreach ($this->selectedRows as $userId) {
            $user = User::withTrashed()->find($userId);
            $user->status = 0;
            $user->save();
            $user->delete();
        }
        $this->selectedRows = [];
    }

    public function restore()
    {
        foreach ($this->selectedRows as $userId) {
            $user = User::withTrashed()->find($userId);
            $user->status = 1;
            $user->save();
            $user->restore();
        }
        $this->selectedRows = [];
    }

    public function edit($id)
    {
        $user = User::withTrashed()->find($id);
        $this->role = DB::table('model_has_roles')->where('model_id', $id)->select('model_id', 'role_id')->get();
        $this->role = json_decode($this->role, 1)[0]['role_id'];
        $this->user_id = $id;
        $this->username = $user->username;
        $this->password = "";
        $this->password_confirm = "";
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
    }

    public function bulkEdit()
    {
        foreach ($this->selectedRows as $userId) {
            DB::table('model_has_roles')
                ->upsert(
                    [
                        ['role_id' => $this->role, 'model_type' => 'App\Models\User', 'model_id' => $userId]
                    ],
                    ['model_id' => $userId],
                    ['role_id']
                );
        }
        $this->selectedRows = [];
    }

    public function render()
    {
        // $this->searchCriterium = array_search($this->searchCriterium, $this->searchCriteria);
        $this->sort = array_search($this->sort, $this->searchCriteria);

        if ($this->sort === 'role') {
            $this->users = User::withTrashed()
                ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('username', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orderBy('roles.name', $this->direction)
                ->select('users.*')
                ->get();
        } else {
            $this->users = User::withTrashed()
                ->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('username', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->get();
        }

        $this->sort = $this->searchCriteria[$this->sort];

        $this->selectedRowsLenght = count($this->selectedRows);

        return view('livewire.users-table-component');
    }
}
