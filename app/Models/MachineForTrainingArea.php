<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineForTrainingArea extends Model
{
    use HasFactory;

    public function machine() {
        return $this->belongsTo(Machine::class);
    }

    public function trainingArea() {
        return $this->belongsTo(TrainingArea::class);
    }
}
