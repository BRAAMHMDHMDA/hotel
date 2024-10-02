<?php

namespace App\Livewire\Dashboard\Rooms;

use App\Models\Room;
use Livewire\Component;

class Delete extends Component
{
    public $room;
    protected $listeners = ['deleteRoom'];

    public function deleteRoom($id)
    {
        $this->room = Room::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $number = $this->room->number;
        $this->room->delete();

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "Room Number of #$number Deleted Successfully");
        $this->dispatch('refreshData')->to(index::class);
    }

    public function render()
    {
        return view('dashboard.rooms.delete');
    }
}
