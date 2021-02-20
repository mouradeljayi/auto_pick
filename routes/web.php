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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');
Route::post('/search', [App\Http\Controllers\FrontController::class, 'index'])->name('cars.search');
Route::resource('cars', App\Http\Controllers\CarController::class);
Route::resource('commands', App\Http\Controllers\CommandController::class);
Route::get('cars/{car}/reserve', [App\Http\Controllers\CarController::class, 'reserve'])->name('cars.reserve');
Route::get('/users/{user}/profile', [App\Http\Controllers\UsersController::class, 'index'])->name('users.profile');
