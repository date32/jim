<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use App\Models\Training;
use App\Models\TrainingArea;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Record extends Component
{
    public $areaWithTraining;
    public $loginUserId;
    public $machines;
    public $monthNumber;

    public function mount()
    {
        // 現在の日付を取得
        $currentDate = Carbon::now();
        // 今月の月数を取得（1〜12の数値）
        $this->monthNumber = $currentDate->month;

        $this->areaWithTraining = TrainingArea::with('machineForTrainingAreas.machine.trainings')->get();
        $this->loginUserId = Auth::user()->id;
        $this->machines = Machine::get();
    }
    public function render()
    {
        return view('livewire.record');
    }
}
