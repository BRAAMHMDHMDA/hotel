<?php
use Illuminate\Support\Facades\Route;

use App\Livewire\Front\{
    Blog\Index as Blog,
    Blog\PostDetails,

    Bookings\Checkout,
    Bookings\Payment,

    Rooms\Index as Rooms,
    Rooms\Show as Show_Room,

    User\Bookings,
    User\ChangePassword,
    User\ProfileInfo,

    Pages\Gallery,
    Pages\Contact,

};


// ===================== Home Routes =====================================
Route::redirect('/', '/home');
Route::view('home', 'front.home.index')->name('home');

// ===================== Rooms Routes =====================================
Route::get('rooms', Rooms::class)->name('rooms');
Route::get('rooms/{slug}', Show_Room::class)->name('room.show');

// ===================== Blog Routes =====================================
Route::get('blog/{category:slug?}', Blog::class)->name('blog');
Route::get('blog/posts/{post:slug}', PostDetails::class)->name('post.details');


Route::middleware('auth:web')->group(function () {
    // ===================== User Routes =====================================
    Route::view('/user/dashboard', 'front.user.dashboard')->name('user.dashboard');
    Route::get('/user/profile', ProfileInfo::class)->name('user.profile');
    Route::get('/user/change-password', ChangePassword::class)->name('user.change-password');
    Route::get('/user/bookings', Bookings::class)->name('user.bookings');

    // ===================== Checkout Routes =====================================
    Route::get('checkout', Checkout::class)->name('checkout');
    Route::get('bookings/{booking}/pay', Payment::class)
        ->name('booking.payment');
    Route::get('bookings/{booking}/pay/stripe/callback', \App\Actions\Front\CompletionStripePayment::class)
        ->name('stripe.return');

    // ===================== Gallery Route =====================================
    Route::get('gallery', Gallery::class)->name('gallery');

    // ===================== Contact Route =====================================
    Route::get('contact', Contact::class)->name('contact');


});

require __DIR__.'/auth.php';
