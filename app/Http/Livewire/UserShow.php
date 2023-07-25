<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserShow extends Component
{
    public $users;
    public $delete_yes_no = false;
    public $deleteUser;
    public $name;

    public function mount() {
        $this->users = User::get();
    }

    public function confirmUserDelete($user_id) {
        $this->delete_yes_no = true;
        $this->deleteUser = $user_id;
        $this->name = User::find($user_id)->name;
    }

    public function delete_yes() {
        User::find($this->deleteUser)->delete();
        $this->users = User::get();
        return redirect()->route('userShow');
    }

    public function delete_no() {
        $this->delete_yes_no =false;
    }
    
    public function render()
    {
        return view('livewire.user-show');
    }
}
