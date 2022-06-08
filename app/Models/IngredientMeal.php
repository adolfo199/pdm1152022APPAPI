<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientMeal extends Model
{
    use HasFactory;
    public function ingrediente()
    {
        return $this->belongsTo(Ingredient::class, "ingredient_id", "id");
    }
}