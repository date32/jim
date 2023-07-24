<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $userName;

    public function mount() {
        $this->userName = Auth::user()->name;
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('top');
    }
    public function render()
    {
        return view('livewire.header');
    }
}
