<?php

namespace App\Livewire\Dashboard\Bookings;

use App\Actions\Dashboard\BookingInvoice;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class Edit extends Component
{
    public $booking, $roomType;
    public $payment_status, $booking_status;
    public $available_rooms, $booked_rooms;

    public function mount(Booking $booking): void
    {
        $this->booking = $booking;

        $check_in = $booking->check_in->format('Y-m-d');
        $check_out = $booking->check_out->format('Y-m-d');

        $this->payment_status = $booking->payment_status;
        $this->booking_status = $booking->status;
        $this->booked_rooms = $booking->rooms;
        // Load Available Rooms
        $booking->roomType->load(['rooms' => function ($query) use ($check_in, $check_out) {
            $query->active()
                ->whereDoesntHave('bookings', function ($query) use ($check_in, $check_out) {
                    $query->where('check_in', '<', $check_out)
                        ->where('check_out', '>', $check_in);
                })
                ->get();
        }]);
        // Assign Available Rooms
        $this->available_rooms = $booking->roomType->rooms;
    }

    public function addRoom($id): void
    {
        // Find the room in available_rooms based on the given ID
        $room = $this->available_rooms->firstWhere('id', $id);

        // If the room is found, add it to booked_rooms and remove it from available_rooms
        if ($room) {
            $this->booked_rooms->push($room); // Add the room to booked_rooms

            // Remove the room from available_rooms
            $this->available_rooms = $this->available_rooms->reject(function ($room) use ($id) {
                return $room->id == $id;
            });
        }
    }

    public function removeRoom($id): void
    {
        // Find the room in booked_rooms based on the given ID
        $room = $this->booked_rooms->firstWhere('id', $id);

        // If the room is found, remove it from booked_rooms and add it to available_rooms
        if ($room) {
            $this->available_rooms->push($room); // Add the room to available_rooms

            // Remove the room from booked_rooms
            $this->booked_rooms = $this->booked_rooms->reject(function ($room) use ($id) {
                return $room->id == $id;
            });
        }
    }

    public function updateBookedRooms(): void
    {
        if (count($this->booked_rooms) !== $this->booking->number_of_rooms)
        {
            $this->dispatch('notify_error', "The number of booked rooms must match the required number of rooms.");
            return;
        }

        $this->booking->rooms()->sync($this->booked_rooms->pluck('id'));
        $this->dispatch('notify_success', 'Booked Rooms Updated Successfully.');
    }

    public function updateStatus(): void
    {
        $this->booking->update([
            'payment_status' => $this->payment_status,
            'status' => $this->booking_status,
        ]);

        $this->dispatch('notify_success', 'Booking Status Updated Successfully.');
    }

    public function downloadInvoice(): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        return BookingInvoice::download($this->booking);
    }

    public function render()
    {
        $this->authorize('booking-edit');
        return view('dashboard.bookings.edit')
            ->layout('dashboard.layout.dashboard-layout', ['title' => 'Edit Booking']);
    }
}
