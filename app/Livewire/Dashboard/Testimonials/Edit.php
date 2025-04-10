<?php

namespace App\Livewire\Dashboard\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['editTestimonial'];

    public $name, $image, $old_image, $city, $message;
    public $testimonial;

    public function rules() :array
    {
        return Testimonial::rules($this->testimonial->id);
    }

    public function editTestimonial($id): void
    {
        $this->testimonial = Testimonial::find($id);
        $this->name = $this->testimonial->name;
        $this->city = $this->testimonial->city;
        $this->message = $this->testimonial->message;
        $this->old_image = $this->testimonial->image_url;

        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit(): void
    {
        $data = $this->validate();
        $data = Testimonial::updateImage($data, $this->old_image,50,50);
        $this->testimonial->update($data);

        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(Index::class);
        $this->dispatch('notify_success', "Testimonial Updated Successfully");
        $this->reset();
    }

    public function render()
    {
        $this->authorize('testimonial-edit');
        return view('dashboard.testimonials.edit');
    }
}
