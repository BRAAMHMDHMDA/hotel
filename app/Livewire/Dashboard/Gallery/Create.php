<?php

namespace App\Livewire\Dashboard\Gallery;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $images;

    public function removeImage($index): void
    {
        array_splice($this->images, $index, 1);
    }

    public function submit(): void
    {
        // Save Images
        foreach ($this->images as $image){
            $image_name = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
            $image_path = 'gallery/'.$image_name;
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image)->resize(550, 550);
            Storage::disk('media')->put($image_path, (string) $image->encode());
            Gallery::create(['image_path' => $image_path]);
        }

        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('createModalToggle');
        $this->dispatch('notify_success', "Images Saved Successfully");
        $this->reset();
    }

    public function render(): View
    {
        return view('dashboard.gallery.create');
    }
}
