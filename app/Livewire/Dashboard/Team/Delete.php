<?php

namespace App\Livewire\Dashboard\Team;

use App\Models\Team;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteTeamMember'];
    public $teamMember;

    public function deleteTeamMember($id)
    {
        $this->teamMember = Team::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $name = $this->teamMember->name;
        $this->teamMember->delete();
        Team::deleteImage($this->teamMember->image_url);

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "$name (Team Member) Deleted Successfully");
        $this->dispatch('refreshData')->to(index::class);
    }

    public function render()
    {
        return view('dashboard.team.delete');
    }
}
