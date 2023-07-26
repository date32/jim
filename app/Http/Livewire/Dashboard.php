<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $machines;
    public $machineId;
    public $machineImg;
    public $type;
    public $minutes;
    public $seconds;
    public $speed;
    public $distance;
    public $weight;
    public $count;

    protected $rules = [
        'machineId' => 'required',
        'minutes' => 'nullable|integer|min:0|max:59',
        'seconds' => 'nullable|integer|min:0|max:59',
        'speed' => 'nullable|numeric',
        'distance' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'count' => 'nullable|numeric',
    ];
    protected $messages = [
        'machineId.required' => '必須項目です',
        'minutes.integer' => '0～59の数字（整数）を入力してください',
        'minutes.min' => '0～59の数字（整数）を入力してください',
        'minutes.max' => '0～59の数字（整数）を入力してください',
        'seconds.integer' => '0～59の数字（整数）を入力してください',
        'seconds.min' => '0～59の数字（整数）を入力してください',
        'seconds.max' => '0～59の数字（整数）を入力してください',
        'speed.numeric' => '数字のみ記入してください',
        'distance.numeric' => '数字のみ記入してください',
        'weight.numeric' => '数字のみ記入してください',
        'count.numeric' => '数字のみ記入してください',
    ];

    public function mount() {        
        $this->machines = Machine::get();    
    }

    public function trainingStore() {
        $this->validate();

        $training = new Training();
        $training->user_id = Auth::user()->id;
        $training->machine_id = $this->machineId;
        $training->minutes = $this->minutes;
        $training->seconds = $this->seconds;
        $training->speed = $this->speed;
        $training->distance = $this->distance;
        $training->weight = $this->weight;
        $training->count = $this->count;
        $training->save();

        return redirect()->route('dashboard');

    }

    public function updatedMachineId() {
        
        if($this->machineId != "") {
            $this->machineImg = Machine::find($this->machineId)->img;
            $this->type = Machine::find($this->machineId)->type;
        }else {
            $this->machineImg = null;
        }
        
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
