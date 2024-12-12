<?php

namespace App\Livewire\Dashboard\Admins;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $image, $old_image, $email, $password, $password_confirmation;

    public function rules() :array
    {
        return Admin::rules();
    }

    public function submit(): void
    {
        $data= $this->validate();
        $data['password'] = Hash::make($data['password']);
        Admin::create(Admin::storeImage($data));

        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('createModalToggle');
        $this->dispatch('notify_success', "$this->name (Admin) Created Successfully");
        $this->reset();

    }

    public function render()
    {
        return view('dashboard.admins.create');
    }
}
