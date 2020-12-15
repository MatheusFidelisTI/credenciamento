<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/userss/{name}', function($name) {
    return " Olá ".$name;
})->where('name', '[A-Za-z]+');

Route::get('/cliente', function() {
    return " Olá ";
})->name('usercliente');

Route::get('/fornecedor/{id}', function($id) {
    return " Olá ".$id;
});


Route::get('/user', [UserController::class, 'index']);


Route::fallback(function() {
    return "Nenhuma rota existe";
});


Route::resource('user2', UserController::class)->only(['index']);