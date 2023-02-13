<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\MeteoController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', UserController::class);
    Route::resource('aircraft', AircraftController::class);
    Route::resource('flight', FlightController::class);
    Route::resource('flightmsg',\App\Http\Controllers\FlightMsgController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::delete('aircraft/destroy/{id}', 'App\Http\Controllers\AircraftController@destroy');
    Route::put('aircraft/update/{id}', 'App\Http\Controllers\AircraftController@update');
    Route::delete('flight/destroy/{id}', 'App\Http\Controllers\FlightController@destroy');
    Route::put('flight/update/{id}', 'App\Http\Controllers\FlightController@update');
    Route::delete('flightmsg/destroy/{id}', 'App\Http\Controllers\FlightMsgController@destroy');
    Route::resource('meteo', MeteoController::class);
    Route::delete('meteo/destroy/{id}', 'App\Http\Controllers\MeteoController@destroy');
});
