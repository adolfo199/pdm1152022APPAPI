<?php

use App\Http\Controllers\Api\CuriositieController;
use App\Http\Controllers\Api\RoutineController;
use App\Http\Controllers\RecetasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('curiosities', CuriositieController::class);
Route::get('getRecetas', [RecetasController::class, 'getAllRecetas']);
Route::get('getRecetaById/{id}', [RecetasController::class, 'getRecetaById']);
Route::post('createReceta', [RecetasController::class, 'createRecetas']);

Route::get('getAllRoutine', [RoutineController::class, 'getAllRoutine']);
Route::get('getRoutineById/{id}', [RoutineController::class, 'getRoutineById']);
Route::post('createRoutine', [RoutineController::class, 'createRoutine']);