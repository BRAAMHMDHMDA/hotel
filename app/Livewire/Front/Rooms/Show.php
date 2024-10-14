<?php

namespace App\Livewire\Front\Rooms;

use App\Models\RoomType;
use Livewire\Component;

class Show extends Component
{
    public $room_type, $checkIn, $checkOut, $guests, $number_of_rooms;

    public function mount($slug)
    {
        // Retrieve the parameters
        $checkIn = $this->checkIn = request()->input('checkIn');
        $checkOut = $this->checkOut = request()->input('checkOut');
        $guests = $this->guests = request()->input('guests')?? 0;

        // Get Room type with images & count available_rooms
        $this->room_type = RoomType::active()
            ->where('slug', $slug)
            ->where('capacity', '>=', $guests)
            ->with('images')
            ->withAvailableRooms($checkIn, $checkOut)
            ->firstOrFail();
    }

    public function updated()
    {
        $this->room_type->loadCount(['rooms as available_rooms' => function ($query) {
            $query->whereDoesntHave('bookings', function ($query) {
                $query->where('check_in', '<', new \DateTime($this->checkOut))
                    ->where('check_out', '>', new \DateTime($this->checkIn));
            });
        }]);
    }

    public function submit()
    {
        $bookingData = [
            'checkIn' => $this->checkIn,
            'checkOut' => $this->checkOut,
            'guests' => $this->guests,
            'number_of_rooms' => $this->number_of_rooms,
            'roomType_id' => $this->room_type->id,
        ];
        session(['bookingData' => $bookingData]);

        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->redirectRoute('checkout', navigate: true);
    }

    public function render()
    {
        return view('front.rooms.show')
            ->layout('front.layout.master', [
                'title' => $this->room_type->name,
            ]);
    }
}
