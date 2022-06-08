<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    use HasFactory;
    public function ingredientes()
    {
        return $this->hasMany(IngredientMeal::class);
    }
    public function instrucciones()
    {
        return $this->hasMany(Instrucciones::class);
    }
}