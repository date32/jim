<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use App\Models\MachineForTrainingArea;
use App\Models\TrainingArea;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admin extends Component
{
    use WithFileUploads;

    public $name;
    public $pass;
    public $machine_name;
    public $machine_img;
    public $training_area;
    public $area_img;
    public $training_areas;
    public $selectedOptions = []; //idが入る

    protected $rules = [
        'name' => 'required|string', //uniqueルール追加すること
        'pass' => 'required|string',
    ];
    // protected $messages = [
    //     'name.required' => 'ユーザー名は必須です。',
    //     'pass.required' => 'パスワードは必須です。',
    // ];

    public function mount()
    {
        // $this->selectedOptions = [];
        // 鍛える箇所のデータ取得
        $this->training_areas = TrainingArea::get();
    }

    public function UserStore()
    {
        $this->validate();

        // 新規ユーザー登録
        $user =  new User();
        $user->name = $this->name;
        $user->password = Hash::make($this->pass);
        $user->save();

        return redirect()->route('admin');
    }

    public function MachineStore()
    {
        // $this->validate();

        // 新規マシーン登録
        $machine =  new Machine();
        // マシーン名登録
        $machine->machine_name = $this->machine_name;

        // マシーン画像があれば登録
        if ($this->machine_img != null) {

            // ディレクトリ名
            $dir = 'img';

            // ファイル名変更
            $file_name = $this->machine_name . '.jpg';

            // ファイルを保存　storageというフォルダに保存される
            $this->machine_img->storeAs('public/' . $dir, $file_name);
            // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
            $machine->img = '/storage' . '/' . $dir . '/' . $file_name;
        }

        // 保存
        $machine->save();

        // 鍛える箇所選択していれば
        if ($this->selectedOptions != []) {
            // 新規マシーンのデータ取得
            $newMachine = Machine::orderBy('id', 'desc')->first();

            //鍛える箇所を選択した数だけデータを作成する
            foreach ($this->selectedOptions as $option) {
                $m_for_t = new MachineForTrainingArea();
                $m_for_t->machine_id = $newMachine->id; // 新規マシーン
                $m_for_t->training_area_id = $option; // 鍛える箇所
                $m_for_t->save();
            }
        }
        return redirect()->route('admin');
    }

    public function TrainingAreaStore()
    {
        // $this->validate();

        $training_area =  new TrainingArea();
        $training_area->training_area = $this->training_area;

        // マシーン画像があれば登録
        if ($this->area_img != null) {

            // ディレクトリ名
            $dir = 'img';

            // ファイル名変更
            $file_name = $this->training_area . '.jpg';

            // ファイルを保存　storageというフォルダに保存される
            $this->area_img->storeAs('public/' . $dir, $file_name);
            // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
            $training_area->area_img = '/storage' . '/' . $dir . '/' . $file_name;
        }

        $training_area->save();

        return redirect()->route('admin');
    }

    public function render()
    {
        return view('livewire.admin');
    }
}
