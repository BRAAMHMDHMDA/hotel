<?php

namespace App\Livewire\Dashboard\Roles;

use Illuminate\View\View;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name, $selectedPermissions = [];
    public $permissions = [];
    public $role;

    public function mount(): void
    {
        $this->permissions = Permission::get();
    }

    public function rules() :array
    {
        return [
            'name' => 'required|unique:roles,name|min:3',
            'selectedPermissions' => 'required|array|min:1|exists:permissions,name',
        ];
    }


    public function submit(): void
    {
        $data= $this->validate();

        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->selectedPermissions);


        $this->dispatch('createModalToggle');
        $this->dispatch('refresh')->to(Index::class);
        $this->dispatch('notify_success', "$this->name (Role) Created Successfully");
        $this->reset(['name', 'selectedPermissions']);

    }
    public function render(): View
    {
        $this->authorize('role-create');
        return view('dashboard.roles.create');
    }
}
