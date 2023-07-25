<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use App\Models\MachineForTrainingArea;
use Livewire\Component;

class MachineShow extends Component
{
    public $machine_with_area;
    public $delete_yes_no = false;
    public $deleteMachine;
    public $name;

    public function mount() {

        // 各マシンに関連するトレーニングエリアを取得します リレーションを2回経由して取得
        $this->machine_with_area = Machine::with('machineForTrainingAreas.trainingArea')->get();
    }

    public function confirmMachineDelete($machine_id) {
        $this->delete_yes_no = true;
        $this->deleteMachine = $machine_id;
        $this->name = Machine::find($machine_id)->machine_name;
    }

    public function delete_yes() {
        Machine::find($this->deleteMachine)->delete();
        $this->machine_with_area = Machine::with('machineForTrainingAreas.trainingArea')->get();
        return redirect()->route('machineShow');
    }

    public function delete_no() {
        $this->delete_yes_no =false;
    }

    public function render()
    {
        return view('livewire.machine-show');
    }
}
