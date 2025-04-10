<?php

namespace App\Livewire\Dashboard\Admins;

use App\Models\Admin;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteAdmin'];
    public $admin;

    public function deleteAdmin($id): void
    {
        $this->admin = Admin::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $name = $this->admin->name;
        $this->admin->delete();
        Admin::deleteImage($this->admin->image_url);

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "$name (Admin) Deleted Successfully");
        $this->dispatch('refreshData')->to(index::class);
    }

    public function render()
    {
        $this->authorize('admin-delete');
        return view('dashboard.admins.delete');
    }
}
