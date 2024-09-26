<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\{
    Auth\AuthenticatedSessionController,
};


/**
 *-------------------------
 * Dashboard Auth Routes
 *------------------------
 */

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest:admin');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth:admin');



/**
 *--------------------------
 * Dashboard Pages Routes
 *-------------------------
 */
Route::group([
    'middleware' => ['auth:admin'],
], function (){

    //================= Home Route=================
    Route::view('home', 'dashboard.index')->name('home');
    Route::redirect('/', '/dashboard/home');

    //================= Team Management Route=================
    Route::view('team', 'dashboard.team.index')->name('team');

    //================= Room-Types Management Route=================
    Route::view('room-types', 'dashboard.room-types.index')->name('room-types');

});




