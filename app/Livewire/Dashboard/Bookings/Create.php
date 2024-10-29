<?php

namespace App\Livewire\Dashboard\Bookings;

use App\Models\Booking;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $room_types, $roomTypeSelected;
    public $available_rooms, $maximum_persons;
    public $room_type_id, $persons=1, $check_in, $check_out, $number_of_rooms=1,
        $total_night, $sub_total, $actual_price, $discount, $total_price, $payment_method='COD';
    public $name, $email, $phone, $country, $state, $zip_code, $address;


    public function mount(): void
    {
        $this->room_types = RoomType::active()->pluck('name', 'id')->toArray();
    }
    private function getRoomType($room_type_id, $checkIn, $checkOut)
    {
        return RoomType::active()
            ->where('id', $room_type_id)
            ->with(['rooms' => function ($query) use ($checkIn, $checkOut) {
                $query->active()
                    ->select('id', 'room_type_id');

                if ($checkIn && $checkOut) {
                    $query->whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<', $checkOut)
                            ->where('check_out', '>', $checkIn);
                    });
                }
            }])->firstOrFail();
    }

    private function calculatePrice(): void
    {
        if (is_null($this->room_type_id)||is_null($this->check_in)||
            is_null($this->check_out)||$this->check_out==''||$this->persons==''||$this->number_of_rooms==''){
            return;
        }
        $this->total_night = Carbon::parse($this->check_in)->diffInDays($this->check_out);
        $this->sub_total = $this->roomTypeSelected->price * $this->number_of_rooms * $this->total_night;
        $this->actual_price = $this->roomTypeSelected->price;
        $this->discount = ($this->sub_total * ($this->roomTypeSelected->discount/100));
        $this->total_price = $this->sub_total - $this->discount;
    }

    public function updated($property): void
    {
        if ($this->room_type_id === ""){

            $this->reset(['room_type_id', 'persons', 'number_of_rooms', 'available_rooms', 'maximum_persons']);

        }elseif($property === 'room_type_id' || $property === 'check_in' || $property === 'check_out'){
            $this->roomTypeSelected = $this->getRoomType($this->room_type_id, $this->check_in, $this->check_out);
            $this->available_rooms = $this->roomTypeSelected->rooms->count();
            $this->maximum_persons = $this->roomTypeSelected->capacity;
            if ($this->available_rooms>0){
                $this->number_of_rooms = 1;
            }else{
                $this->number_of_rooms = 0;
            }
            $this->persons = 1;
        }
        $this->calculatePrice();
    }

    public function rules()
    {
        return Booking::rules();
    }

    public function submit()
    {
        $data = $this->validate();

        DB::beginTransaction();
        try {

            $booking = Booking::create($data);

            $roomIds = $this->roomTypeSelected->rooms->pluck('id')->toArray();
            $bookingRoomIds = array_slice($roomIds, 0, $this->number_of_rooms);
            $booking->rooms()->attach($bookingRoomIds);


            $this->redirectRoute('dashboard.bookings', navigate: true);
            $this->dispatch('notify_success', 'Congratulations, Booking Successfully');

            DB::commit();

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function render()
    {
        return view('dashboard.bookings.create')
            ->layout('dashboard.layout.dashboard-layout', ['title' => 'Create Booking']);
    }
}
