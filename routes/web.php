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

// Routes publiques
Route::view('/', 'home')->name('home');
Route::get('/hotels', '\App\Http\Controllers\HotelsController@index')->name('hotels');

// Routes nécessitant une authentification et vérification
Route::middleware(['auth', 'verified'])->group(function () {
    // Routes de profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Routes du tableau de bord
    Route::view('/dashboard', 'dashboard.dashboard')->name('dashboard')->middleware(['auth', 'verified']);

    // Routes de réservations
    Route::prefix('dashboard/')->group(function () {
        Route::get('/', [\App\Http\Controllers\ReservationController::class, 'index']);
        Route::get('reservations/create/{id}', [\App\Http\Controllers\ReservationController::class, 'create'])->middleware(['auth', 'verified']);
        Route::get('reservations/show/{reservation}', [\App\Http\Controllers\ReservationController::class, 'show'])->middleware(['auth', 'verified']);
        Route::get('reservations/edit/{reservation}', [\App\Http\Controllers\ReservationController::class, 'edit'])->middleware(['auth', 'verified']);
        Route::get('reservations/delete/{reservation}', [\App\Http\Controllers\ReservationController::class, 'destroy'])->middleware(['auth', 'verified']);
        Route::resource('reservations', \App\Http\Controllers\ReservationController::class)->except('create');
        //Routes dHotel
        Route::get('/hotel/create', '\App\Http\Controllers\HotelsController@create')->name('hotel.create')->middleware(['auth', 'verified']);
        Route::post('/hotel/store', '\App\Http\Controllers\HotelsController@store')->name('hotel.store')->middleware(['auth', 'verified']);
        Route::get('/hotel/edit/{hotel}', '\App\Http\Controllers\HotelsController@edit')->name('hotel.edit')->middleware(['auth', 'verified']);
        Route::post('/hotel/update/{hotel}', '\App\Http\Controllers\HotelsController@update')->name('hotel.update')->middleware(['auth', 'verified']);
    });
});

// Autres routes d'authentification
require __DIR__ . '/auth.php';
