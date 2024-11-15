<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\{
    Auth\AuthenticatedSessionController,
};
use \App\Livewire\Dashboard\{

    RoomTypes\Create as Create_RoomType,
    RoomTypes\Edit as Edit_RoomType,

    Bookings\Edit as Edit_Booking,
    Bookings\Create as Create_Booking,

    BlogPosts\Create as Create_BlogPost,
    BlogPosts\Edit as Edit_BlogPost,

    Settings\Index as Settings,

};


/**
 *-------------------------
 * Dashboard Auth Routes
 *------------------------
 */

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest:admin');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth:admin');

Route::view('test', 'dashboard.test')->name('test');


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

    //================= Testimonials Management Route=================
    Route::view('testimonials', 'dashboard.testimonials.index')->name('testimonials');

    //================= Room-Types Management Route=================
    Route::view('room-types', 'dashboard.room-types.index')->name('room-types');
    Route::get('room-types/create', Create_RoomType::class)->name('room-type.create');
    Route::get('room-types/{roomType}/edit', Edit_RoomType::class)->name('room-type.edit');

    //================= Rooms Management Route=================
    Route::view('rooms', 'dashboard.rooms.index')->name('rooms');

    //================= Bookings Management Route=================
    Route::view('bookings', 'dashboard.bookings.index')->name('bookings');
    Route::get('bookings/create', Create_Booking::class)->name('booking.create');
    Route::get('bookings/{booking}/edit', Edit_Booking::class)->name('booking.edit');

    //================= Blog Routes=================
    Route::view('blog/categories', 'dashboard.blog-categories.index')->name('blog-categories');

    Route::view('blog/posts', 'dashboard.blog-posts.index')->name('blog-posts');
    Route::get('blog/posts/create', Create_BlogPost::class)->name('blog-posts.create');
    Route::get('blog/posts/{blogPost}/edit', Edit_BlogPost::class)->name('blog-posts.edit');

    Route::view('blog/comments', 'dashboard.blog-comments.index')->name('blog-comments');

    //================= Gallery Management Route=================
    Route::view('gallery', 'dashboard.gallery.index')->name('gallery');

    //================= Contact Management Route=================
    Route::view('contacts', 'dashboard.contacts.index')->name('contacts');

    //================= Settings Management Route=================
    Route::get('settings/{group?}', Settings::class)->name('settings');

});
