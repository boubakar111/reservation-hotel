<?php

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


Route::view('/', 'home');
Route::get('/hotels', '\App\Http\Controllers\HotelsController@index')->name('hotels');
Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback' )->name('auth0-callback');
Route::get('/login', 'Auth\Auth0IndexController@login')->name('login');
Route::get('/logout', 'Auth\Auth0IndexController@logout')->name('logout')->middleware('auth');

Route::prefix('dashboard/')->controller(\App\Http\Controllers\ReservationController::class)->group(function (){
    Route::view('/','dashboard/dashboard');
    Route::get('/reservations/create/{id}', 'create');
    Route::get('reservations','index');
    Route::get('/reservations/show/{reservation}', 'show');
    Route::get('/reservations/edit/{reservation}', 'edite');
    Route::get('/reservations/delete/{reservation}', 'destroy');
    Route::resource('reservations','\App\Http\Controllers\ReservationController')->except('create');
});


