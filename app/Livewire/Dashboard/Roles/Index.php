<?php

namespace App\Livewire\Dashboard\Roles;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $roles;


    public function mount(): void
    {
         $this->roles = $this->getRoles();
    }

    #[On('refresh')]
    public function refresh(): void
    {
        $this->roles = $this->getRoles();
    }

    private function getRoles()
    {
        return Role::where('guard_name', 'admin')
            ->with('permissions')
            ->withCount('users')
            ->get();
    }

    public function editRole($id)
    {

    }

    public function render(): View
    {
        $this->authorize('role-list');
        return view('dashboard.roles.index')->layout('dashboard.layout.dashboard-layout');
    }
}
