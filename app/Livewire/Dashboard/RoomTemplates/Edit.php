<?php

namespace App\Livewire\Dashboard\RoomTemplates;

use App\Models\Facility;
use App\Models\Image;
use App\Models\RoomTemplate;
use App\Models\RoomType;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $roomType, $roomTemplate;
    public $uploadedImages, $images = [];
    public $short_description, $description, $price, $discount, $total_adult, $total_child,
        $capacity, $size, $view, $bed_style, $facilities, $status, $image, $old_image;


    public function mount($id)
    {
        $this->roomTemplate = RoomTemplate::with('roomType')->find($id);
        $this->roomType = $this->roomTemplate->roomType;
        $this->short_description = $this->roomTemplate->short_description;
        $this->description = $this->roomTemplate->description;
        $this->price = $this->roomTemplate->price;
        $this->discount = $this->roomTemplate->discount;
        $this->total_adult = $this->roomTemplate->total_adult;
        $this->total_child = $this->roomTemplate->total_child;
        $this->capacity = $this->roomTemplate->capacity;
        $this->size = $this->roomTemplate->size;
        $this->view = $this->roomTemplate->view;
        $this->bed_style = $this->roomTemplate->bed_style;
        $this->facilities = $this->roomTemplate->facilities->pluck('name')->toArray(); // Change to array
        $this->status = $this->roomTemplate->status;
        $this->old_image = $this->roomTemplate->image_url;
        $this->uploadedImages = $this->roomTemplate->images;
    }

    public function rules()
    {
        return RoomTemplate::rules();
    }
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
    public function submit()
    {
        // Validate & Update Data
        $data = $this->validate();
        $this->roomTemplate->update(RoomTemplate::updateImage($data, $this->old_image));

        // Save Facilities & Delete That Not Linked With any Room Template
        $facilitiesIDs = [];
        foreach ($this->facilities as $facility) {
            $facilityModel = Facility::firstOrCreate(['name' => $facility]); // Create facility if it doesn't exist
            $facilitiesIDs[] = $facilityModel->id;
        }
        $this->roomTemplate->facilities()->sync($facilitiesIDs); // Sync facilities with the roomTemplate
        Facility::doesntHave('roomTemplates')->delete();

        // Save Images
        foreach ($this->images as $image){
            $image_path = $image->store('room_templates/'.$this->roomType->roomTemplate->id, 'media');
            $this->roomType->roomTemplate->images()->create([
                'image_path' => $image_path
            ]);
        }

        // Notify
        $this->dispatch('notify_success', "Updated Successfully");

    }

    public function render()
    {
        return view('dashboard.room-templates.edit')->layout('dashboard.layout.dashboard-layout');
    }
}
