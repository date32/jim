<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use App\Models\Training;
use App\Models\TrainingArea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Record extends Component
{
    public $areaWithTraining;
    public $loginUserId;
    public $machines;

    public function mount() {
        $this->areaWithTraining = TrainingArea::with('machineForTrainingAreas.machine.trainings')->get();
        $this->loginUserId = Auth::user()->id;
        $this->machines = Machine::get();
    }
    public function render()
    {
        return view('livewire.record');
    }
}
