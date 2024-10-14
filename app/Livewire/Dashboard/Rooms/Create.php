<?php

namespace App\Livewire\Dashboard\Rooms;

use App\Models\Room;
use App\Models\RoomType;
use Livewire\Component;

class Create extends Component
{
    public $number, $room_type_id, $status=Room::STATUS_DRAFT;
    public $room_types;

    public function mount()
    {
        $this->room_types = RoomType::pluck('name','id')->toArray();
    }

    public function rules(){
        return Room::rules();
    }

    public function submit()
    {
        $data= $this->validate();
        Room::create($data);

        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('createModalToggle');
        $this->dispatch('notify_success', "(Room $this->number) Created Successfully");
    }

    public function render()
    {
        return view('dashboard.rooms.create');
    }
}
