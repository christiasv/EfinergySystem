<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/usuarios', \App\Http\Controllers\UsersController::class);
Route::get('/usuarios/create', [\App\Http\Controllers\UsersController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [\App\Http\Controllers\UsersController::class, 'store'])->name('usuarios.store');
Route::post('/usuarios/{cod}','\App\Http\Controllers\UsersController@update')->name("usuarios.update");
