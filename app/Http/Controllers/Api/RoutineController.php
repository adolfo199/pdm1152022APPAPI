<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercises;
use App\Models\Routine;
use App\Models\RoutineExercise;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoutineController extends Controller
{
    public function getAllRoutine()
    {
        return Routine::with('exercises.exercise')->get();
    }
    public function getRoutineById(int $id)
    {
        return Routine::with('exercises.exercise')->where('id', $id)->first();
    }
    public function createRoutine(Request $request)
    {
        try {
            DB::beginTransaction();
            $new_routine = new Routine();
            $new_routine->name = $request->nombre;
            $new_routine->description = $request->descripcion;
            $new_routine->categoria = $request->categoria;
            $new_routine->save();

            foreach ($request->exercises as $exercise) {
                $new_exercise  = new Exercises();
                $new_exercise->name = $exercise["name"];
                $new_exercise->description = $exercise["descripcion"];
                $new_exercise->series = $exercise["series"];
                $new_exercise->photo = $exercise["photo"];
                $new_exercise->save();

                $new_routine_exercise = new RoutineExercise();
                $new_routine_exercise->routine_id = $new_routine->id;
                $new_routine_exercise->exercises_id = $new_exercise->id;
                $new_routine_exercise->save();
            }
            DB::commit();
            return response()->json(["Message" => "Guardado con exito", "ok" => true]);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(["error" => $ex->getMessage(), "ok" => false], 500);
        }
    }
}