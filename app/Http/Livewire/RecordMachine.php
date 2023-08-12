<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RecordMachine extends Component
{
    public $machine;
    public $trainings;
    public $machineWithArea;

    public function mount(String $id) {
        $this->machine = Machine::find($id);
        // ログイン中のユーザーでクリックしたマシーンを使ったトレーニングを取得
        $this->trainings = Training::where('user_id', Auth::user()->id)->where('machine_id', $id)->orderBy('created_at', 'desc')->get();
        $this->machineWithArea = Machine::where('id', $id)->with('machineForTrainingAreas.trainingArea')->get();
    }

    public function render()
    {
        return view('livewire.record-machine');
    }
}
