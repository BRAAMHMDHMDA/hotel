<?php

namespace App\Livewire\Dashboard\Rooms;

use App\Models\Room;
use App\Models\RoomType;
use Livewire\Component;

class Edit extends Component
{
    public $number, $room_type_id, $status;
    public $room_types;
    public $room;

    protected $listeners = ['editRoom'];

    public function mount()
    {
        $this->room_types = RoomType::pluck('name','id')->toArray();
    }

    public function rules():array { return Room::rules($this->room->id); }

    public function editRoom($id)
    {
        $this->room = Room::findOrFail($id);
        $this->number = $this->room->number;
        $this->room_type_id = $this->room->room_type_id;
        $this->status = $this->room->status;

        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit()
    {
        $data= $this->validate();
        $this->room->update($data);

        $this->dispatch('refreshData')->to(Index::class);
        $this->dispatch('editModalToggle');
        $this->dispatch('notify_success', "(Room $this->number) Updated Successfully");
    }

    public function render()
    {
        $this->authorize('room-edit');
        return view('dashboard.rooms.edit');
    }
}
