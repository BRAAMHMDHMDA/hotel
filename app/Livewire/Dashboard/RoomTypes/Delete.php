<?php

namespace App\Livewire\Dashboard\RoomTypes;

use App\Models\RoomType;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteRoomType'];
    public $roomType;

    public function deleteRoomType($id)
    {
        $this->roomType = RoomType::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $name = $this->roomType->name;
        $this->roomType->delete();
        RoomType::deleteImage($this->roomType->image_url);

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "$name (Room Type) Deleted Successfully");
        $this->dispatch('refreshData')->to(Index::class);
    }
    public function render()
    {
        $this->authorize('room_type-delete');
        return view('dashboard.room-types.delete');
    }
}
