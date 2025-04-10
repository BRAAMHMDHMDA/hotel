<?php

namespace App\Livewire\Dashboard\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteTestimonial'];
    public $testimonial;

    public function deleteTestimonial($id): void
    {
        $this->testimonial = Testimonial::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit(): void
    {
        $this->testimonial->delete();
        Testimonial::deleteImage($this->testimonial->image_url);

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "Testimonial Deleted Successfully");
        $this->dispatch('refreshData')->to(index::class);
    }

    public function render()
    {
        $this->authorize('testimonial-delete');
        return view('dashboard.testimonials.delete');
    }
}
