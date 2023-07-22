<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingArea extends Model
{
    use HasFactory;

    public function machineForTrainingAreas() {
        return $this->hasMany(MachineForTrainingArea::class);
    }
}
