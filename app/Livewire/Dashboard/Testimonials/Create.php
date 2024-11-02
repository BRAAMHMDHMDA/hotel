<?php

namespace App\Livewire\Dashboard\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $image, $old_image, $city, $message;

    public function rules() :array
    {
        return Testimonial::rules();
    }

    public function submit(): void
    {
        $data= $this->validate();
        Testimonial::create(Testimonial::storeImage($data,50,50));

        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('createModalToggle');
        $this->dispatch('notify_success', "Testimonial Added Successfully");
        $this->reset();
    }

    public function render()
    {
        return view('dashboard.testimonials.create');
    }
}
