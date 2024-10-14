<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Front\{
    Rooms\Index as Rooms,
    Rooms\Show as Show_Room,
    Rooms\Checkout,
};



// ===================== Home Routes =====================================
Route::redirect('/', '/home');
Route::view('home', 'front.home.index')->name('home');

Route::get('rooms', Rooms::class)->name('rooms');
Route::get('rooms/{slug}', Show_Room::class)->name('room.show');

Route::middleware('auth:web')->group(function () {
    Route::view('/user/dashboard', 'front.user.dashboard')->name('user.dashboard');
    Route::view('/user/profile', 'front.user.profile')->name('user.profile');

    Route::get('checkout', Checkout::class)->name('checkout');


});
Route::view('/user/change-password', 'front.user.change-password')->name('user.change-password');

require __DIR__.'/auth.php';
