<?php

namespace App\Livewire\Dashboard\Team;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $image, $old_image, $position, $facebook;

    public function rules() :array
    {
        return Team::rules();
    }

    public function submit()
    {
        $data= $this->validate();
        Team::create(Team::storeImage($data,550,670));

        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('createModalToggle');
        $this->dispatch('notify_success', "$this->name (Team Member) Created Successfully");
        $this->reset();

    }

    public function render()
    {
        $this->authorize('team-list');
        return view('dashboard.team.create');
    }
}
