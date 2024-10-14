<?php

namespace App\Livewire\Front\Rooms;

use App\Models\RoomType;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Index extends Component
{
    public $rooms;
    public $checkIn;
    public $checkOut;
    public $guests;

    public function rules()
    {
        return [
            'checkIn' => [
                'nullable', // Skip validation if empty or null
                'required_with:checkOut,guests', // Required if checkOut or guests is not null or not empty
                'date', // Only check if checkIn is provided
                'after_or_equal:today', // Only check if checkIn is provided
            ],
            'checkOut' => [
                'nullable',
                'required_with:checkIn,guests', // Required if checkIn or guests is not null or not empty
                'date',
                'after_or_equal:checkIn',
            ],
            'guests' => [
                'nullable',
                'required_with:checkIn,checkOut', // Required if checkIn or checkOut is not null or not empty
                'integer',
                'min:1',
            ],
        ];
    }

    public function mount()
    {
        // Retrieve the parameters
        $this->checkIn = request()->input('checkIn');
        $this->checkOut = request()->input('checkOut');
        $this->guests = request()->input('guests');

        try {
            $this->validate();
            if ($this->checkIn && $this->checkOut) {
                $this->rooms = RoomType::active()
                    ->where('capacity', '>=', $this->guests)
                    ->withAvailableRooms($this->checkIn, $this->checkOut)
                    ->having('available_rooms', '>', 0)
                    ->get();

            } else {
                $this->rooms = RoomType::active()
                    ->withAvailableRooms()
                    ->having('available_rooms', '>', 0)
                    ->get();
            }
            // If validation passes, proceed with your logic
            // Example: saving data to the database

        } catch (ValidationException $e) {
            $this->rooms = RoomType::active()
                ->withAvailableRooms()
                ->having('available_rooms', '>', 0)
                ->get();
            // Handle the validation error, e.g., log it or perform other actions
            session()->flash('error', 'There was an issue with your inputs.');
            // Optionally, throw the validation exception to show error messages in the UI
            throw $e;
        }

    }

    public function render()
    {
        return view('front.rooms.index')
            ->layout('front.layout.master', [
                'title' => 'Hotel Rooms',
            ]);
    }
}
