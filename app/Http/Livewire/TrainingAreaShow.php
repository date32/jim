<?php

namespace App\Http\Livewire;

use App\Models\TrainingArea;
use Livewire\Component;

class TrainingAreaShow extends Component
{

    public $areas;
    public $delete_yes_no = false;
    public $deleteArea;
    public $name;

    public function mount() {
        $this->areas = TrainingArea::get();
    }

    public function confirmTrainigAreaDelete($area_id) {
        $this->delete_yes_no = true;
        $this->deleteArea = $area_id;
        $this->name = TrainingArea::find($area_id)->training_area;
    }

    public function delete_yes() {
        TrainingArea::find($this->deleteArea)->delete();
        $this->areas = TrainingArea::get();
        return redirect()->route('trainingAreaShow');
    }

    public function delete_no() {
        $this->delete_yes_no =false;
    }
    public function render()
    {
        return view('livewire.training-area-show');
    }
}
