<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/alumnos', [AlumnoController::class,'index']);
Route::post('/alumnos/crear',  [AlumnoController::class,'store', 'store']);

Route::get('/alumnos/crearAsig', [AlumnoController::class, 'create']);
Route::post('/alumnos/crearAsig',  [AlumnoController::class, 'store']);

Route::get('/alumnos/ver/{id}', [AlumnoController::class, 'show']);
Route::get('/alumnos/editar/{id}', [AlumnoController::class, 'edit']);
Route::put('/alumnos/editar/{id}',  [AlumnoController::class, 'update']);
Route::get('/alumnos/eliminar/{id}',  [AlumnoController::class, 'destroy']);
