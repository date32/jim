<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $userName;
    public $admin = false;
    public $today;

    public function mount() {
        $this->userName = Auth::user()->name;
        if($this->userName === 'admin') {
            $this->admin = true;
        }
        $this->today = $this->getFormat();
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('top');
    }
    public function getFormat()
    {
        // 現在の日付を取得
        $day = Carbon::now();
        
        // 日本語の曜日表示を設定
        $week = ['日', '月', '火', '水', '木', '金', '土'];

        // フォーマットした日付を返す
        return $day->format('Y年n月j日（') . $week[$day->dayOfWeek] . '）';
    }
    public function render()
    {
        return view('livewire.header');
    }
}
