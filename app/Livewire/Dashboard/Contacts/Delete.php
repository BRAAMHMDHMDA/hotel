<?php

namespace App\Livewire\Dashboard\Contacts;

use App\Models\Contact;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteContact'];
    public $contact;

    public function deleteContact($id): void
    {
        $this->contact = Contact::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit(): void
    {
        $this->contact->delete();

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "Contact Deleted Successfully");
        $this->dispatch('refreshData')->to(Index::class);
    }
    public function render()
    {
        $this->authorize('contact-delete');
        return view('dashboard.contacts.delete');
    }
}
