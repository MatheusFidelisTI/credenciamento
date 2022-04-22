<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CredenciamentoController;
use App\Http\Controllers\ArquivosController;
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


Route::fallback(function() {
    return "Nenhuma rota existe";
});


Route::resource('user', UserController::class)->only(['index']);

Route::resource('credenciamento', CredenciamentoController::class)->only(['index']);

Route::resource('arquivos', ArquivosController::class)->only(['index']);

Route::get('/teste', function() {
    return view('teste', ['name' => 'Marcelo Bianco']);
});

Route::post('arquivos/store', ArquivosController::class.'@filesStore')->name('file.store');
Route::get('arquivos/delete/{id}', ArquivosController::class.'@filesDelete')->name('file.delete');