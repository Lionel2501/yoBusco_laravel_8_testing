<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//routas protegidas
Route::group(['middleware' => [('auth')]], function (){
});

//routtas de anuncio
Route::get('/', [App\Http\Controllers\AnuncioController::class, 'index'])->name('inicio');
Route::get('/yobusco/crear', [App\Http\Controllers\AnuncioController::class, 'create'])->name('anuncio.crear');
Route::get('/yobusco/{anuncio}', [App\Http\Controllers\AnuncioController::class, 'show'])->name('anuncio.show');
Route::get('/yobusco/{anuncio}/editar', [App\Http\Controllers\AnuncioController::class, 'edit'])->name('anuncio.editar');
Route::post('/guardar', [App\Http\Controllers\AnuncioController::class, 'store'])->name('anuncio.store');
Route::put('/yobusco/{anuncio}', [App\Http\Controllers\AnuncioController::class, 'update'])->name('anuncio.update');
Route::delete('/yobusco/{anuncio}', [App\Http\Controllers\AnuncioController::class, 'destroy'])->name('anuncio.delete');

//buscador
Route::get('/buscar', [App\Http\Controllers\AnuncioController::class, 'buscar'])->name('buscar.show');

//routa criterios
Route::get('/categoria/{categoria}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categoria.show');
Route::get('/provincia/{provincia}', [App\Http\Controllers\ProvinciaController::class, 'show'])->name('provincia.show');


//routas de perfil
Route::get('/perfiles/{perfil}', [App\Http\Controllers\PerfilController::class, 'show'])->name('perfil.show');
Route::get('/perfiles/{perfil}/editar', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil.editar');
Route::put('/perfiles/{perfil}', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update');

//routas de likes
Route::post('liked/{anuncio}', [App\Http\Controllers\LikesController::class, 'update'])->name('like.update');
