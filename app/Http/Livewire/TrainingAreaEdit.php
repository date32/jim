<?php

namespace App\Http\Livewire;

use App\Models\TrainingArea;
use Livewire\Component;
use Livewire\WithFileUploads;

class TrainingAreaEdit extends Component
{
    use WithFileUploads;

    public $area;
    public $training_area;
    public $area_img;

    protected $rules = [
        'training_area' => 'unique:training_areas,training_area',
    ];
    protected $messages = [
        'training_area.unique' => 'そのトレーニングエリアは登録されています',
    ];

    public function mount(String $id)
    {
        $this->area = TrainingArea::find($id);
    }

    public function trainingAreaUpdate($id)
    {
        $this->validate();

        // 変更するデータ取得
        $update_area = TrainingArea::find($id);

        if ($this->training_area != null) {
            $update_area->training_area = $this->training_area;
        }

        if ($this->area_img != null) {
            // ディレクトリ名
            $dir = 'img';

            // ファイル名変更
            $file_name = $this->training_area . '.jpg';

            // ファイルを保存　storageというフォルダに保存される
            $this->area_img->storeAs('public/' . $dir, $file_name);
            // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
            $update_area->area_img = '/storage' . '/' . $dir . '/' . $file_name;
        }

        $update_area->save();

        return redirect()->route('trainingAreaShow');
    }

    public function render()
    {
        return view('livewire.training-area-edit');
    }
}
