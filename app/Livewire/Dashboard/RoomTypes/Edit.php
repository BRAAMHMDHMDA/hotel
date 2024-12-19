<?php

namespace App\Livewire\Dashboard\RoomTypes;

use App\Models\Facility;
use App\Models\Image;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $name, $short_description, $description, $price, $discount=0, $total_adult, $total_child,
        $capacity, $size, $view, $bed_style, $image, $old_image, $uploadedImages, $status=RoomType::STATUS_DRAFT;
    public array $images, $facilities;
    public RoomType $roomType;

    public function removeImage($index)
    {
        array_splice($this->images, $index, 1);
    }
    public function deleteUploadedImage($image_path)
    {
        // Logic to delete the uploaded file if needed
        if (Storage::disk('media')->exists($image_path)) {
            Storage::disk('media')->delete($image_path);
            $this->uploadedImages = $this->uploadedImages->filter(fn($image) => $image->image_path !== $image_path);
            Image::where('image_path', $image_path)->delete();
        }
    }
    public function rules() :array
    {
        return RoomType::rules($this->roomType->id);
    }

    public function mount(RoomType $roomType)
    {
        $this->roomType =  $roomType;

        $this->facilities = $roomType->facilities->pluck('name')->toArray(); // Change to array
        $this->uploadedImages = $roomType->images;

        $this->name = $roomType->name;
        $this->old_image = $roomType->image_url;
        $this->short_description = $roomType->short_description;
        $this->description = $roomType->description;
        $this->price = $roomType->price;
        $this->discount = $roomType->discount;
        $this->total_adult = $roomType->total_adult;
        $this->total_child = $roomType->total_child;
        $this->capacity = $roomType->capacity;
        $this->size = $roomType->size;
        $this->view = $roomType->view;
        $this->bed_style = $roomType->bed_style;
        $this->status = $roomType->status;
    }

    public function submit()
    {
        // Validate & Update Data
        $data = $this->validate();
        $this->roomType->update(RoomType::updateImage($data, $this->old_image));

        // Save Facilities & Delete That Not Linked With any Room Template
        $facilitiesIDs = [];
        foreach ($this->facilities as $facility) {
            $facilityModel = Facility::firstOrCreate(['name' => $facility]); // Create facility if it doesn't exist
            $facilitiesIDs[] = $facilityModel->id;
        }
        $this->roomType->facilities()->sync($facilitiesIDs); // Sync facilities with the roomTemplate
        Facility::doesntHave('roomTypes')->delete();

        // Save Images
        foreach ($this->images as $image){
            $image_path = $image->store('room_types/'.$this->roomType->id, 'media');
            $this->roomType->images()->create([
                'image_path' => $image_path
            ]);
        }

        //Navigate
        $this->redirect(route('dashboard.room-types'), navigate: true);
        // Notify
        $this->dispatch('notify_success', "$this->name (Room Type) Updated Successfully");
        $this->reset();
    }

    public function render()
    {
        $this->authorize('room_type-edit');
        return view('dashboard.room-types.edit')->layout('dashboard.layout.dashboard-layout');
    }
}
