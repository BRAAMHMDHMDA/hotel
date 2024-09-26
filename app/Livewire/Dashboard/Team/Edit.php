<?php

namespace App\Livewire\Dashboard\Team;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['editTeamMember'];

    public $name, $image, $old_image, $position, $facebook;
    public $teamMember;

    public function rules() :array
    {
        return Team::rules($this->teamMember->id);
    }

    public function editTeamMember($id)
    {

        $this->teamMember = Team::findOrFail($id);
        $this->name = $this->teamMember->name;
        $this->position = $this->teamMember->position;
        $this->facebook = $this->teamMember->facebook;
        $this->old_image = $this->teamMember->image_url;

        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit()
    {
        $data = $this->validate();
        $data = Team::updateImage($data, $this->old_image,550,670);
        $this->teamMember->update($data);

        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('notify_success', "$this->name (Team Member) Updated Successfully");
        $this->reset();
    }

    public function render()
    {
        return view('dashboard.team.edit');
    }
}
