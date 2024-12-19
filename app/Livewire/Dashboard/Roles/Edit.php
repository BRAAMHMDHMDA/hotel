<?php

namespace App\Livewire\Dashboard\Roles;

use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $name, $selectedPermissions = [];
    public $permissions = [], $role;

    public function rules() :array
    {
        return [
            'name' => ['required', 'string', 'min:3', Rule::unique('roles', 'name')->ignore($this->role->id)],
            'selectedPermissions' => 'required|array|min:1|exists:permissions,name',
        ];
    }

    #[On('editRole')]
    public function editRole($id): void
    {
        $this->permissions = Permission::get();
        $this->role = Role::with('permissions')->findOrFail($id);
        $this->name = $this->role->name;
        $this->selectedPermissions = $this->role->permissions->pluck('name')->toArray(); // Ensure it's an array
        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit(): void
    {
        $data = $this->validate();
        $this->role->update($data);
        $this->role->syncPermissions($this->selectedPermissions);

        $this->dispatch('editModalToggle');
        $this->dispatch('refresh')->to(Index::class);
        $this->dispatch('notify_success', "$this->name (Role) Updated Successfully");
    }

    public function render()
    {
        $this->authorize('role-edit');
        return view('dashboard.roles.edit');
    }
}
