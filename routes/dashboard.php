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

    //=================Home Route=================
    Route::get('/home', function () {
        return view('dashboard.index');
    })->name('home');
    Route::redirect('/', '/dashboard/home');

    Route::get('/test', function () {
        return view('dashboard.test');
    })->name('test');

});




