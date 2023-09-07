<?php

use App\Http\Controllers\ProfileController;
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

Route::prefix('cities')->group(function () {
    Route::get('/{cod}', 'App\Http\Controllers\CitiesController@show');
    Route::put('/{cod}', 'App\Http\Controllers\CitiesController@update')->name('cities.update');
    Route::delete('/{cod}', 'App\Http\Controllers\CitiesController@destroy');
    Route::get('/', 'App\Http\Controllers\CitiesController@index')->name('cities.show');
    Route::post('/', 'App\Http\Controllers\CitiesController@store');
});

Route::prefix('clients')->group(function () {
    Route::get('/{cod}', 'App\Http\Controllers\ClientController@show');
    Route::put('/{cod}', 'App\Http\Controllers\ClientController@update')->name('client.update');
    Route::delete('/{cod}', 'App\Http\Controllers\ClientController@destroy');
    Route::get('/', 'App\Http\Controllers\ClientController@index')->name('client.show');
    Route::post('/', 'App\Http\Controllers\ClientController@store');
});

Route::prefix('users')->group(function () {
    Route::get('/{id}', 'App\Http\Controllers\UsersController@show');
    Route::put('/{id}', 'App\Http\Controllers\UsersController@update')->name('user.update');
    Route::delete('/{id}', 'App\Http\Controllers\UsersController@destroy');
    Route::get('/', 'App\Http\Controllers\UsersController@index')->name('user.show');
    Route::post('/', 'App\Http\Controllers\UsersController@store');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
