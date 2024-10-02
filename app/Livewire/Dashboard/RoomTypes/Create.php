<?php

namespace App\Livewire\Dashboard\RoomTypes;

use App\Models\RoomTemplate;
use App\Models\RoomType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $image, $old_image;

    public function rules() :array
    {
        return RoomType::rules();
    }

    public function submit()
    {
        $data= $this->validate();
        $roomType = RoomType::create(RoomType::storeImage($data));
        $roomType->roomTemplate()->create();
        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('createModalToggle');
        $this->dispatch('notify_success', "$this->name (Room Type) Created Successfully");
        $this->reset();

    }
    public function render()
    {
        return view('dashboard.room-types.create');
    }
}
