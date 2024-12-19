<?php

namespace App\Livewire\Dashboard\Admins;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['editAdmin'];

    public $name, $image, $old_image, $email;
    public $roles=[], $selectedRoles=[];
    public $admin;

    public function mount(): void {$this->roles = Role::pluck('name')->toArray();}

    public function rules() :array
    {
        return Admin::rules($this->admin->id);
    }

    public function editAdmin($id)
    {
        $this->admin = Admin::with('roles')->findOrFail($id);
        $this->name = $this->admin->name;
        $this->email = $this->admin->email;
        $this->old_image = $this->admin->image_url;
        $this->selectedRoles = $this->admin->roles->pluck('name')->toArray();

        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit()
    {
        $data = $this->validate();
        $data = Admin::updateImage($data, $this->old_image);
        $this->admin->update($data);
        $this->admin->syncRoles($this->selectedRoles);

        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('notify_success', "$this->name (Admin) Updated Successfully");
        $this->resetExcept(['roles']);
    }
    public function render()
    {
        $this->authorize('admin-edit');
        return view('dashboard.admins.edit');
    }
}
