<?php

namespace App\Livewire\Dashboard\Contacts;

use App\Models\Contact;
use Livewire\Component;

class Show extends Component
{
    public $contact;
    protected $listeners = ['showContact'];

    public function showContact($id): void
    {
        $this->contact = Contact::find($id);
        if ($this->contact->is_read == "0") {
            $this->contact->is_read = "1";
            $this->contact->save();
            $this->dispatch('refreshData')->to(index::class);
        }
        $this->dispatch('showModal');
    }

    public function render()
    {
        return view('dashboard.contacts.show');
    }
}
