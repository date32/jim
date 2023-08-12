<?php

namespace App\Http\Livewire;

use App\Models\TrainingArea;
use Livewire\Component;

class MachineSerch extends Component
{
    public $serchMachine;

    public function mount(String $id) {
        $this->serchMachine = TrainingArea::where('id', $id)->with('machineForTrainingAreas.machine')->get();
    }
    public function render()
    {
        return view('livewire.machine-serch');
    }
}
