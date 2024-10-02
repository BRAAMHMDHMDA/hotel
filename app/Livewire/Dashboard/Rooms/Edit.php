<?php

namespace App\Livewire\Dashboard\Rooms;

use App\Models\Room;
use App\Models\RoomTemplate;
use Livewire\Component;

class Edit extends Component
{
    public $number, $room_template_id, $status;
    public $room_templates;
    public $room;

    protected $listeners = ['editRoom'];

    public $name, $image, $old_image;
    public $roomType;

    public function mount()
    {
        $this->room_templates = RoomTemplate::select('id','room_type_id')->with('roomType:id,name')
            ->get()
            ->mapWithKeys(function ($roomTemplate) {
                return [$roomTemplate->id => $roomTemplate->roomType->name];
            })
            ->toArray();
    }

    public function rules():array { return Room::rules(); }

    public function editRoom($id)
    {

        $this->room = Room::findOrFail($id);
        $this->number = $this->room->number;
        $this->room_template_id = $this->room->room_template_id;
        $this->status = $this->room->status;

        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit()
    {
        $data= $this->validate();
        $this->room->update($data);

        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('editModalToggle');
        $this->dispatch('notify_success', "(Room $this->number) Updated Successfully");
    }





    public function render()
    {
        return view('dashboard.rooms.edit');
    }
}
