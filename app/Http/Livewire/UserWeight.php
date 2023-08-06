<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserWeight extends Component
{
    public $open = false;
    public $userWeight;
    public $weight;

    protected $rules = [
        'weight' => 'required|numeric|max:200|min:1',
    ];
    protected $messages = [
        'weight.required' => '必須項目です',
        'weight.numeric' => '数字のみ記入してください',
        'weight.max' => '1以上200以下の数字を入力して下さい',
        'weight.min' => '1以上200以下の数字を入力して下さい',
    ];

    public function mount() {
        $userId = Auth::user()->id;
        $this->userWeight = User::find($userId)->weight;
    }

    public function weightOpen() {
        $this->open = !$this->open;
    }

    public function weightStore() {
        $this->validate();
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $user->weight = $this->weight;
        $user->save();

        return redirect()->route('weight');
    }

    public function render()
    {
        return view('livewire.user-weight');
    }
}
