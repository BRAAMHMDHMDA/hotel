<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\{
    Auth\AuthenticatedSessionController,
};
use \App\Livewire\Dashboard\{
    RoomTypes\Create as Create_RoomType,
    RoomTypes\Edit as Edit_RoomType,
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
    Route::get('room-types/create', Create_RoomType::class)->name('room-type.create');
    Route::get('room-types/{roomType}/edit', Edit_RoomType::class)->name('room-type.edit');

    //================= Rooms Management Route=================
    Route::view('rooms', 'dashboard.rooms.index')->name('rooms');

});




Route::get('test', function (){
    $checkIn = "2024-10-07";   // Requested check-in date
    $checkOut = "2024-10-8 "; // Requested check-out date

    $availableRooms = \App\Models\Room::whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
        $query->where(function ($query) use ($checkIn, $checkOut) {
            $query->where('check_in', '<', $checkOut)
                ->where('check_out', '>', $checkIn);
        });
    })->get();
    echo $availableRooms;
});
