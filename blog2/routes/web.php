<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('/alumnos', [AlumnoController::class, 'index'])->middleware(['auth']);
Route::get('/alumnos/crear', [AlumnoController::class, 'create'])->middleware(['auth']);
Route::post('/alumnos/crear',  [AlumnoController::class, 'store'])->middleware(['auth']);

Route::get('/alumnos/crearAsig', [AlumnoController::class, 'create'])->middleware(['auth']);
Route::post('/alumnos/crearAsig',  [AlumnoController::class, 'store']);

Route::get('/alumnos/ver/{id}', [AlumnoController::class, 'show']);
Route::get('/alumnos/editar/{id}', [AlumnoController::class, 'edit'])->middleware(['auth']);
Route::put('/alumnos/editar/{id}',  [AlumnoController::class, 'update'])->middleware(['auth']);
//INVESTIGAR EL SOFT DELETE//
Route::get('/alumnos/eliminar/{id}',  [AlumnoController::class, 'destroy'])->middleware(['auth']);
/////////

//manejo de archivos//
Route::get('file-upload', [AlumnoController::class, 'index']);
Route::post('store', [AlumnoController::class, 'store']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('index');
});

Route::post('EnvioDatos',[AlumnoController::class.'store']);
///////////////////


?>