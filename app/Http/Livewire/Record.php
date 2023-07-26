<?php

namespace App\Http\Livewire;

use App\Models\Training;
use App\Models\TrainingArea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Record extends Component
{
    // public $trainingArea;
    public $areaWithTraining;
    // public $trainings;
    public $loginUserId;

    public function mount() {
        // $this->trainingArea = TrainingArea::get();
        $this->areaWithTraining = TrainingArea::with('machineForTrainingAreas.machine.trainings')->get();
        $this->loginUserId = Auth::user()->id;
        // dd($this->areaWithTraining);
        // $a = $this->areaWithTraining->where('id', Auth::user()->id);
        // dd(Auth::user()->id);
        // $this->trainings = Training::where('id', Auth::user()->id)->get();
    }
    public function render()
    {
        return view('livewire.record');
    }
}
