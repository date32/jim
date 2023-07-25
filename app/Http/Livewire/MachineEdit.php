<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use App\Models\MachineForTrainingArea;
use App\Models\TrainingArea;
use Livewire\Component;
use Livewire\WithFileUploads;

class MachineEdit extends Component
{
    use WithFileUploads;

    public $machine;
    public $machine_name;
    public $machine_img;
    public $training_areas;
    public $selectedOptions = []; //idが入る

    protected $rules = [
        'machine_name' => 'unique:machines,machine_name'
    ];
    protected $messages = [
        'machine_name.unique' => 'そのマシーン名は登録されています',
    ];

    public function mount(String $id)
    {
        $this->machine = Machine::with('machineForTrainingAreas.trainingArea')->find($id);
        $this->training_areas = TrainingArea::get();
    }

    public function machineUpdate($id) // アップデート
    {
        $this->validate();
        
        // アップデートするマシーンデータ取得
        $update_machine = Machine::find($id);

        // マシーン名に入力していたらマシーン名変更
        if ($this->machine_name != null) {

            $update_machine->machine_name = $this->machine_name;
        }

        // 画像を選択していたら画像を変更する
        if ($this->machine_img != null) {
            // ディレクトリ名
            $dir = 'img';

            // ファイル名変更
            $file_name = $this->machine_name . '.jpg';

            // ファイルを保存　storageというフォルダに保存される
            $this->machine_img->storeAs('public/' . $dir, $file_name);

            // DBに保存
            // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
            $update_machine->img = '/storage' . '/' . $dir . '/' . $file_name;
        }

        // トレーニングエリアを選択していたら変更する
        if ($this->selectedOptions != []) {

            // 変更するマシーンとエリアが紐づいているデータを取得
            $m_for_ts = MachineForTrainingArea::where('machine_id', $id)->get();
            // 古いデータは消す
            foreach($m_for_ts as $m_for_t) {
                $m_for_t->delete();
            }

            //鍛える箇所を選択した数だけデータを作成する
            foreach ($this->selectedOptions as $option) {
                $m_for_t = new MachineForTrainingArea();
                $m_for_t->machine_id = $this->machine->id; // 新規マシーン
                $m_for_t->training_area_id = $option; // 鍛える箇所
                $m_for_t->save();
            }
        }

        // 保存
        $update_machine->save();

        return redirect()->route('machineShow');
    }

    public function render()
    {
        return view('livewire.machine-edit');
    }
}
