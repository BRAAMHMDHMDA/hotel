<?php

namespace App\Livewire\Dashboard\Gallery;

use App\Models\Gallery;
use Illuminate\View\View;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteImage'];
    public $image;

    public function deleteImage($id): void
    {
        $this->image = Gallery::findOrFail($id);
        $this->dispatch('deleteModalToggle');
    }
    public function submit(): void
    {
        $this->image->delete();

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "Image Deleted Successfully");
        $this->dispatch('refreshData')->to(index::class);
    }
    public function render(): View
    {
        return view('dashboard.gallery.delete');
    }
}
