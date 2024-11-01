<?php

namespace App\Livewire\Front\User;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Bookings extends Component
{
    public $bookings;

    public function mount()
    {
        $this->bookings = Auth::user()->bookings()->with('roomType')->get();
    }

    public function cancel(Booking $booking): void
    {
        $booking->update([
           'status' => 'cancelled',
        ]);
        $this->bookings = Auth::user()->bookings()->with('roomType')->get();
        session()->flash('success', 'Booking Cancelled Successfully');

    }

    public function render()
    {
        return view('front.user.bookings')
            ->layout('front.layout.master', ['title' => 'Bookings']);
    }
}
