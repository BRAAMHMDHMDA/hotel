<?php

namespace App\Livewire\Dashboard\Rooms;

use App\Models\Room;
use App\Models\RoomTemplate;
use Livewire\Component;

class Create extends Component
{
    public $number, $room_template_id, $status;
    public $room_templates;

    public function mount()
    {
        $this->room_templates = RoomTemplate::select('id','room_type_id')->with('roomType:id,name')
            ->get()
            ->mapWithKeys(function ($roomTemplate) {
                return [$roomTemplate->id => $roomTemplate->roomType->name];
            })
            ->toArray();

//        $this->room_templates = RoomTemplate::select('id', 'room_type_id') // assuming room_type_id is the foreign key
//        ->with('roomType:id,name')
//            ->get()
//            ->pluck('id', 'roomType.name')
//            ->toArray();
//        dd($this->room_templates);

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
