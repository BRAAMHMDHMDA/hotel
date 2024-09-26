<?php

namespace App\Livewire\Dashboard\RoomTypes;

use App\Models\RoomType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['editRoomType'];

    public $name, $image, $old_image, $position, $facebook;
    public $roomType;

    public function rules() :array
    {
        return RoomType::rules($this->roomType->id);
    }

    public function editRoomType($id)
    {

        $this->roomType = RoomType::findOrFail($id);
        $this->name = $this->roomType->name;
        $this->position = $this->roomType->position;
        $this->facebook = $this->roomType->facebook;
        $this->old_image = $this->roomType->image_url;

        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit()
    {
        $data = $this->validate();
        $data = RoomType::updateImage($data, $this->old_image);
        $this->roomType->update($data);

        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('notify_success', "$this->name (Room Type) Updated Successfully");
        $this->reset();
    }

    public function render()
    {
        return view('dashboard.room-types.edit');
    }
}
