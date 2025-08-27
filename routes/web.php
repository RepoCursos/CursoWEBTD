<?php

use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueryBuilderController;
use App\Http\Controllers\RawSqlQueriesController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () { return view('welcome');});

//Ruta para demostrar el metodo __invoke()
Route::get('/', PrincipalController::class)->name('home');

//Si declaramos otra funcion dentro de nuestro controlador y queremos mantener "Route::resource" entonces tenemos que declarar 
//antes las rutas con las funciones adicionales al tipico crud 
Route::get('otraFunction/{video}', [VideosController::class, 'otraFunction'])->name('videos.otraFunction');

//Refactorizando con Services
Route::get('otraAccion', [VideosController::class, 'otraAccion'])->name('videos.otraAccion');

//Inyeccion de dependencia
Route::get('hash', [VideosController::class, 'hash'])->name('videos.hash');

Route::resource('videos', VideosController::class);  

//Rutas del loging
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


//Rutas para Ejercicios de Migracion
Route::get('raw-query/consulta/{video}', [RawSqlQueriesController::class, 'consulta'])->name('raw.query.consulta');
Route::get('raw-query/insertar', [RawSqlQueriesController::class, 'insertar'])->name('query.insertar');
Route::get('raw-query/actualizar/{plataforma}/{video}', [RawSqlQueriesController::class, 'actualizar'])->name('query.actualizar');
Route::get('raw-query/eliminar/{video}', [RawSqlQueriesController::class, 'eliminar'])->name('query.eliminar');

Route::get('raw-query/eliminarTabla', [RawSqlQueriesController::class, 'eliminarTabla'])->name('query.eliminarTabla');

//Probar cuando implementemos roles
/*
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('videos.')
    ->group(function () {
        // Rutas del panel de administrador
        Route::get('/', [VideosController::class, 'index'])->name('videos.index');
        Route::get('create', [VideosController::class, 'create'])->name('videos.create');
        Route::post('store', [VideosController::class, 'store'])->name('videos.store');
        Route::get('show/{video}', [VideosController::class, 'show'])->name('videos.show');
        Route::get('edit/{video}', [VideosController::class, 'edit'])->name('videos.edit');
        Route::put('update/{video}', [VideosController::class, 'update'])->name('videos.update');
        Route::delete('destroy/{video}', [VideosController::class, 'destroy'])->name('videos.destroy');
    });
*/
