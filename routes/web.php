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


// ===================== Home Routes =====================================
Route::redirect('/', '/home');
Route::view('home', 'front.index')->name('home');

Route::middleware('auth:web')->group(function () {
    Route::view('/user/dashboard', 'front.user.dashboard')->name('user.dashboard');
    Route::view('/user/profile', 'front.user.profile')->name('user.profile');

});
Route::view('/user/change-password', 'front.user.change-password')->name('user.change-password');

require __DIR__.'/auth.php';
