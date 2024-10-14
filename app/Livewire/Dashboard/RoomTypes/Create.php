<?php

namespace App\Livewire\Dashboard\RoomTypes;

use App\Models\Facility;
use App\Models\Image;
use App\Models\RoomType;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $short_description, $description, $price, $discount=0, $total_adult, $total_child,
        $capacity, $size, $view, $bed_style, $image, $status=RoomType::STATUS_DRAFT;
    public array $images, $facilities;

    public function rules()
    {
        return RoomType::rules();
    }

    public function submit()
    {
        $data= $this->validate();
        $roomType = RoomType::create(RoomType::storeImage($data));

        // Save Facilities & Delete That Not Linked With any Room Template
        $facilitiesIDs = [];
        foreach ($this->facilities as $facility) {
            $facilityModel = Facility::firstOrCreate(['name' => $facility]); // Create facility if it doesn't exist
            $facilitiesIDs[] = $facilityModel->id;
        }
        $roomType->facilities()->sync($facilitiesIDs); // Sync facilities with the roomTemplate
        Facility::doesntHave('roomTypes')->delete();

        // Save Images
        foreach ($this->images as $image){
            $image_path = $image->store('room_types/'.$roomType->id, 'media');
            $roomType->images()->create([
                'image_path' => $image_path
            ]);
        }

        $this->redirect(route('dashboard.room-types'), navigate: true);
        $this->reset();
        $this->dispatch('notify_success', "$this->name (Room Type) Created Successfully");

    }

    public function render()
    {
        return view('dashboard.room-types.create')->layout('dashboard.layout.dashboard-layout');
    }
}
