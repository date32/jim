<?php

namespace App\Http\Livewire;

use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $userName;
    public $admin = false;
    public $today;
    public $message;

    public function mount() {
        $this->userName = Auth::user()->name;
        if($this->userName === 'admin') {
            $this->admin = true;
        }
        $this->today = $this->getFormat();

        $latestCreatedAt = Training::latest('created_at')->value('created_at');
        if ($latestCreatedAt) {
            $latestDate = strtotime($latestCreatedAt);
            $today = strtotime('today');
            $diffDays = floor(($today - $latestDate) / (60 * 60 * 24)); // 差分日数を計算
        
            if ($diffDays == 0 || $diffDays < 0) {
                $this->message = "毎日頑張っていますね";
            } elseif ($diffDays >= 1 && $diffDays < 10) {
                $this->message = "今日はどこを鍛えますか？";
            } elseif ($diffDays >= 10) {
                $this->message = "久しぶりのトレーニングです。無理しないようにしましょう";
            }
        } else {
            // レコードが存在しない場合の処理
            // 例えば、データベースが空の場合など
            $this->message = "初めてのトレーニングです";
        }
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
