<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\IngredientMeal;
use App\Models\Instrucciones;
use App\Models\Recetas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecetasController extends Controller
{
    public function getAllRecetas()
    {
        $recetas = Recetas::with('ingredientes.ingrediente', 'instrucciones')->get()->toArray();
        for ($i = 0; $i < count($recetas); $i++) {
            $recetas[$i]["instrucciones"] = array_column($recetas[$i]["instrucciones"], "instruccion");
            $recetas[$i]["ingredientes"] = array_column(array_column($recetas[$i]["ingredientes"], "ingrediente"), "name");
        }
        return $recetas;
    }
    public function getRecetaById(int $id)
    {
        $receta = Recetas::with('ingredientes.ingrediente', 'instrucciones')->where('id', $id)->first()->toArray();
        $receta["instrucciones"] = array_column($receta["instrucciones"], "instruccion");
        $receta["ingredientes"] = array_column(array_column($receta["ingredientes"], "ingrediente"), "name");
        return $receta;
    }
    public function createRecetas(Request $request)
    {
        try {
            DB::beginTransaction();
            $newreceta = new Recetas();
            $newreceta->nombre = $request->nombre;
            $newreceta->image = $request->image;
            $newreceta->porciones = $request->porciones;
            $newreceta->calorias = $request->calorias;
            $newreceta->tempPreparacion = $request->tempPreparacion;
            $newreceta->categoria = $request->categoria;
            $newreceta->save();
            //ingredientes
            foreach ($request->ingredientes as $ingrediente) {
                $new_ingrediente = new Ingredient();
                $new_ingrediente->name = $ingrediente;
                $new_ingrediente->save();

                $new_receta_ingrediente = new IngredientMeal();
                $new_receta_ingrediente->ingredient_id = $new_ingrediente->id;
                $new_receta_ingrediente->recetas_id = $newreceta->id;
                $new_receta_ingrediente->save();
            }
            //instrucciones de la receta
            foreach ($request->instrucciones as $instruccion) {
                $new_instruccion = new Instrucciones();
                $new_instruccion->recetas_id = $newreceta->id;
                $new_instruccion->instruccion = $instruccion;
                $new_instruccion->save();
            }
            DB::commit();
            return response()->json(["Message" => "Guardado con exito", "ok" => true]);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(["error" => $ex->getMessage(), "ok" => false]);
        }
    }
}