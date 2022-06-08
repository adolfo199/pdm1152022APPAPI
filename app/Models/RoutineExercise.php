<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineExercise extends Model
{
    use HasFactory;
    public function exercise()
    {
        return $this->belongsTo(Exercises::class, "exercises_id");
    }
}