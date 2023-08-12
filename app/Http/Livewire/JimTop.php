<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JimTop extends Component
{
    public $name;
    public $pass;
    public $errorMessage;
    public $login;

    protected $rules = [
        'name' => 'required|string',
        'pass' => 'required|string',
    ];
    // protected $messages = [
    //     'name.required' => 'ユーザー名は必須です。',
    //     'pass.required' => 'パスワードは必須です。',
    // ];

    public function mount() {
      $this->login = Auth::user();
    }
    
    public function login() {
        $this->validate();

      if(Auth::attempt(['name' => $this->name, 'password' => $this->pass])) {
        if(Auth::user()->name === 'admin') {
          return redirect()->route('admin');
      }else {
          return redirect()->route('dashboard');
      }
        
      }else {
        $this->errorMessage = 'ユーザー名またはパスワードが間違っています';
      }
    }

    public function render()
    {
        return view('livewire.jim-top');
    }
}
