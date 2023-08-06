<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use App\Models\Training;
use App\Models\User;
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
    public $digitalCalorie;
    public $calorie;
    public $strength;

    protected $rules = [
        'machineId' => 'required',
        'minutes' => 'nullable|integer|min:0|max:59',
        'seconds' => 'nullable|integer|min:0|max:59',
        'speed' => 'nullable|numeric',
        'distance' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'count' => 'nullable|numeric',
        'digitalCalorie' => 'nullable|numeric',
        'strength' => 'nullable|numeric',
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
        'digitalCalorie.numeric' => '数字のみ記入してください',
        'strength.numeric' => '数字のみ記入してください',
    ];

    public function mount()
    {
        $this->machines = Machine::get();
    }

    public function trainingStore()
    {
        $this->validate();
        $training = new Training();
        $training->user_id = Auth::user()->id;
        $training->machine_id = $this->machineId;

        // 持久力
        if ($this->minutes == null) {
            $training->minutes = 0;
        } else {
            $training->minutes = $this->minutes;
        }

        if ($this->seconds == null) {
            $training->seconds = 0;
        } else {
            $training->seconds = $this->seconds;
        }
        $training->speed = $this->speed;
        $training->distance = $this->distance;

        // 筋力
        $training->weight = $this->weight;
        $training->count = $this->count;
        $training->strength = $this->strength;

        // 共通
        if ($this->type == '持久力') {
            if (is_numeric($this->digitalCalorie)) {
                $training->calorie = $this->digitalCalorie;
            }
        }

        if ($this->type == '筋力') {
            if (is_numeric($this->calorie)) {
                $training->calorie = $this->calorie;
            }
        }

        $training->save();

        return redirect()->route('dashboard');
    }

    public function updatedMachineId()
    {

        if ($this->machineId != "") {
            $this->machineImg = Machine::find($this->machineId)->img;
            $this->type = Machine::find($this->machineId)->type;
        } else {
            $this->machineImg = null;
        }
    }

    public function updatedMinutes($name, $value)
    {
        // 体重取得
        $userId = Auth::user()->id;
        $userWeight = User::find($userId)->weight;

        // 入力時間が空欄なら0にする
        if ($this->minutes == '' || !is_numeric($this->minutes)) {
            $this->minutes = 0;
        }

        $hour = ($this->minutes * 60 + $this->seconds) / 3600;
        $this->calorie = round(3.5 * $userWeight * $hour * 1.05, 2);
    }
    public function updatedSeconds($name, $value)
    {
        // 体重取得
        $userId = Auth::user()->id;
        $userWeight = User::find($userId)->weight;

        // 入力時間が空欄なら0にする
        if ($this->seconds == '' || !is_numeric($this->seconds)) {
            $this->seconds = 0;
        }
        $hour = ($this->minutes * 60 + $this->seconds) / 3600;
        $this->calorie = round(3.5 * $userWeight * $hour * 1.05, 2);
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
