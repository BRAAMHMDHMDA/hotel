<?php

namespace App\Livewire\Dashboard\Admins;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['editAdmin'];

    public $name, $image, $old_image, $email;
    public $admin;

    public function rules() :array
    {
        return Admin::rules($this->admin->id);
    }

    public function editAdmin($id)
    {
        $this->admin = Admin::findOrFail($id);
        $this->name = $this->admin->name;
        $this->email = $this->admin->email;
        $this->old_image = $this->admin->image_url;

        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit()
    {
        $data = $this->validate();
        $data = Admin::updateImage($data, $this->old_image);
        $this->admin->update($data);

        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('notify_success', "$this->name (Admin) Updated Successfully");
        $this->reset();
    }
    public function render()
    {
        return view('dashboard.admins.edit');
    }
}
