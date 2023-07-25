<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    public function trainings() {
        return $this->hasMany(Training::class);
    }
    public function machineForTrainingAreas() {
        return $this->hasMany(MachineForTrainingArea::class);
    }

    public function delete() {
        $this->trainings()->delete();
        $this->machineForTrainingAreas()->delete();

        return parent::delete();
    }

}
