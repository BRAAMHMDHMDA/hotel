<?php

namespace App\Livewire\Front\Rooms;

use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Checkout extends Component
{
    public $room_type, $check_in, $check_out, $persons, $number_of_rooms;
    public $bookingData;
    public $room_type_id, $sub_total, $total_price, $total_night, $actual_price, $discount, $payment_method='COD';
    public $name, $email, $phone, $country, $state, $city, $address, $zip_code;

    public function mount()
    {
        $bookingData = $this->bookingData = session('bookingData');
        if (is_null($bookingData)) return $this->redirectRoute('home', navigate: true);

            $this->check_in = new \DateTime($bookingData['checkIn']);
            $this->check_out = new \DateTime($bookingData['checkOut']);
            $this->persons = $bookingData['guests'];
            $this->room_type_id = $bookingData['roomType_id'];
            $this->number_of_rooms = $bookingData['number_of_rooms'];

            $this->room_type = $this->getRoomType($this->room_type_id, $this->persons, $this->check_in, $this->check_out);
            $this->total_night = $this->check_in->diff($this->check_out)->days;
            $this->actual_price = $this->sub_total = $this->room_type->price * $this->number_of_rooms * $this->total_night;
            $this->discount = ($this->sub_total * ($this->room_type->discount/100));
            $this->total_price = $this->sub_total - $this->discount;

    }

    private function getRoomType($room_type_id, $persons, $checkIn, $checkOut)
    {
        return RoomType::active()
            ->where('id', $room_type_id)
            ->where('capacity', '>=', $persons)
            ->with(['rooms' => function ($query) use ($checkIn, $checkOut, $persons) {
                $query->active()
                    ->whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<', $checkOut)
                            ->where('check_out', '>', $checkIn);
                    })
                    ->select('id', 'room_type_id');
            }])->firstOrFail();
    }

    public function rules()
    {
        return Booking::rules();
    }

    public function submit()
    {
        $this->room_type = $this->getRoomType($this->room_type_id, $this->persons, $this->check_in, $this->check_out);

        $data = $this->validate();

        if ($this->number_of_rooms > count($this->room_type->rooms)){
            session()->forget('bookingData');
            session()->flash('error', 'The number of available rooms does not match the number of rooms requested for booking.');
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->redirectRoute('home', navigate: true);
        }

        DB::beginTransaction();
        try {

            $booking = Booking::create($data);

            $roomIds = $this->room_type->rooms->pluck('id')->toArray();
            $bookingRoomIds = array_slice($roomIds, 0, $this->number_of_rooms);
            $booking->rooms()->attach($bookingRoomIds);
            session()->forget('bookingData');
            session()->flash('success', 'Congratulations, Booking Successfully');

            DB::commit();

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->redirectRoute('home', navigate: true);
    }


    public function render()
    {
        return view('front.rooms.checkout')
            ->layout('front.layout.master', [
                'title' => 'Booking Checkout',
            ]);
    }

}
