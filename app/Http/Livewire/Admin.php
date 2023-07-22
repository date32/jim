<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Admin extends Component
{
    public $name;
    public $pass;

    protected $rules = [
        'name' => 'required|string|max:3',
        'pass' => 'required|string',
    ];
    // protected $messages = [
    //     'name.required' => 'ユーザー名は必須です。',
    //     'pass.required' => 'パスワードは必須です。',
    // ];

    public function UserStore() {
        $this->validate();

        $user =  new User();
        $user->name = $this->name;
        $user->password = Hash::make($this->pass);
        $user->save();

        return redirect()->route('admin');
 
    }
 
    public function render()
    {
        return view('livewire.admin');
    }
}
