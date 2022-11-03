<?php

namespace App\Http\Livewire\Unit;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AddUser extends Component
{
    public $selected_users, $search = "", $unit_id, $unit_users;

    public function mount()
    {
        $this->selected_users = [];
        $this->unit_users = Unit::find($this->unit_id)->users()->get();
    }

    public function getSuggestedUsersProperty()
    {
        $users = User::where('first_name', 'like', '%' . $this->search . '%')->orWhere('last_name', 'like', '%' . $this->search . '%')->get();
        return $users->diff($this->unit_users);
    }

    public function selectUser($user)
    {
        array_unshift($this->selected_users, $user);
        $this->selected_users = array_unique($this->selected_users);
    }

    public function unselectUser($user)
    {
        unset($this->selected_users[array_search($user, $this->selected_users)]);
        $this->selected_users = array_values($this->selected_users);
    }

    public function saveUser()
    {
        Unit::find($this->unit_id)->users()->attach($this->selected_users);
        redirect()->route('units.details', $this->unit_id);
    }

    public function render()
    {
        return view('livewire.unit.add-user');
    }
}
