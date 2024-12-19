<?php

namespace App\Livewire\Dashboard\Roles;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Delete extends Component
{
    public $role;

    #[On('deleteRole')]
    public function deleteRole($id)
    {
        $this->role = Role::findOrFail($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $name = $this->role->name;
        $this->role->delete();

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "$name (Role) Deleted Successfully");
        $this->dispatch('refresh')->to(Index::class);
    }
    public function render()
    {
        $this->authorize('role-delete');
        return view('dashboard.roles.delete');
    }
}
