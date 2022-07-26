<?php

namespace App\Http\Livewire;

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
    public $role,$roles;
    protected $listeners = ['selectRows'];

    public $searchCriteria = [
        'username' => 'USERNAME',
        'first_name' => 'FIRST NAME',
        'last_name' => 'LAST NAME',
        'email' => 'EMAIL',
        'status' => 'STATUS'
    ];

    public $headings = [
        'userUsername' => 'USERNAME',
        'userFirstName' => 'FIRST NAME',
        'userLastName' => 'LAST NAME',
        'userEmail' => 'EMAIL',
        'userStatus' => 'STATUS'
    ];

    public function order($sort){
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
        }
    }

    public function create(){
        if($this->password === $this->password_confirm){
            $user = User::withTrashed()->where('username',$this->username);
            if($user->count() > 0){
                $user->restore();
            }else{
                $user = new User;
                $user->username = $this->username;
                $user->password = Hash::make($this->password);
                $user->first_name = $this->first_name;
                $user->last_name = $this->last_name;
                $user->email = $this->email;
                $user->save();
            }
        }
    }

    public function update(){
        $user = User::withTrashed()
                ->find($this->user_id);
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        if(($this->password != "") && ($this->password === $this->password_confirm)){
            $user->password = Hash::make($this->password);
        }
        $user->save();

        // $this->reset(['search','users','sort','direction','username','password','password_confirm','first_name','last_name','email','user_id','selectedRows','selectedRowsLenght','role','roles']);
    }

    public function selectRows($rows){
        $this->selectedRows = $rows;
    }

    public function delete(){
        foreach($this->selectedRows as $userId){
            $user = User::withTrashed()->find($userId);
            $user->status = 0;
            $user->save();
            $user->delete();
        }
        $this->selectedRows = [];
    }

    public function restore(){
        foreach($this->selectedRows as $userId){
            $user = User::withTrashed()->find($userId);
            $user->status = 1;
            $user->save();
            $user->restore();
        }
        $this->selectedRows = [];
    }

    public function edit($id){
        $user = User::withTrashed()->find($id);
        $this->role = DB::table('model_has_roles')->where('model_id',$id)->select('model_id','role_id')->get();
        $this->role = json_decode($this->role);
        $this->user_id = $id;
        $this->username = $user->username;
        $this->password = "";
        $this->password_confirm = "";
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
    }

    public function bulkEdit(){
        foreach($this->selectedRows as $userId){
            DB::table('model_has_roles')
            ->upsert([
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
        
        $this->users = User::withTrashed()
                ->where('first_name', 'like', '%'.$this->search.'%')
                ->orWhere('last_name', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orWhere('username', 'like', '%'.$this->search.'%')
                ->orWhere('status', 'like', '%'.$this->search.'%')
                // ->orWhere('status', 'like', '%'.$this->search.'%')
                ->orderBy($this->sort, $this->direction)
                ->get();
        $this->roles = DB::table('roles')->select('id','name')->get();
        // $this->searchCriterium = $this->searchCriteria[$this->searchCriterium];
        $this->sort = $this->searchCriteria[$this->sort];

        $this->selectedRowsLenght = count($this->selectedRows);

        return view('livewire.users-table-component');
    }
}
