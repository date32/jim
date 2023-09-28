<?php

namespace App\Http\Livewire;

use App\Models\Training;
use Livewire\Component;
use Livewire\WithPagination;

class Test extends Component
{

    use WithPagination;

    // private $trainings;
    // protected $trainings;
    // public $trainings;

    public function mount()
    {
        // $this->trainings = Training::paginate(3);
    }
    public function render()
    {
        return view('livewire.test', [
            'trainings' => Training::paginate(3),
        ]);
    }
}
