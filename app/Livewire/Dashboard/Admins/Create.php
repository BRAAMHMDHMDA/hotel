<?php

namespace App\Livewire\Dashboard\Admins;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    use WithFileUploads;

    public $name, $image, $old_image, $email, $password, $password_confirmation;
    public $roles=[], $selectedRoles=[];

    public function mount(): void {
        $this->roles = Role::pluck('name')->toArray();
    }
    public function rules() :array {return Admin::rules();}

    public function submit(): void
    {
        $data= $this->validate();
        $data['password'] = Hash::make($data['password']);
        $admin = Admin::create(Admin::storeImage($data));
        $admin->assignRole($this->selectedRoles); // Assign roles (array or single role)

        $this->dispatch('refreshData')->to(Index::class);
        $this->dispatch('createModalToggle');
        $this->dispatch('notify_success', "$this->name (Admin) Created Successfully");
        $this->resetExcept(['roles']);
    }

    public function render(): View
    {
        $this->authorize('admin-create');
        return view('dashboard.admins.create');
    }
}
