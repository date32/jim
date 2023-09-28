<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use App\Models\Training;
use App\Models\TrainingArea;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Record extends Component
{
    use WithPagination;

    public $areaWithTraining;
    public $loginUserId;
    public $machines;
    // private $trainings;
    // protected $trainings;
    // public $trainings;
    public $monthNumber;
    public $calorie;
    public $monthCalorie;

    public function mount()
    {
        // 現在の日付を取得
        $currentDate = Carbon::now();
        // 今月の西暦と月数を取得（1〜12の数値）
        $this->monthNumber = $currentDate->format('Y-n');

        // トレーニングとマシーンをリレーションしてエリアを取得
        $this->areaWithTraining = TrainingArea::with('machineForTrainingAreas.machine.trainings')->get();
        // ログインユーザーのIDを取得
        $this->loginUserId = Auth::user()->id;
        $this->machines = Machine::get();
        // ログインユーザーのトレーニングを取得→ページネーションにしたので下のrenderメソッドで取得する
        // $this->trainings = Training::where('user_id', $this->loginUserId)->orderBy('created_at', 'desc')->with('machine')->paginate(3);

        // カロリー計算
        $this->calorie = 0;
        $this->monthCalorie = 0;
        $trainings = Training::where('user_id', $this->loginUserId)->orderBy('created_at', 'desc')->with('machine')->get();
        foreach($trainings as $training) {
            // 今までの消費カロリーの累計を計算
            $this->calorie += $training->calorie;
            if($this->monthNumber == $training->created_at->format('Y-n')) {
                // 今月の消費カロリーの累計を計算
                $this->monthCalorie += $training->calorie;
            }
        }
    }
    public function render()
    {
        return view('livewire.record', [
            'trainings' => Training::where('user_id', $this->loginUserId)->orderBy('created_at', 'desc')->with('machine')->paginate(10),
        ]);
    }
}
