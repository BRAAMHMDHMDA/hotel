<?php

namespace App\Livewire\Front\Pages;

use Illuminate\View\View;
use Livewire\Component;

class Contact extends Component
{
    public $name, $email, $phone, $subject, $message;
    public $privacy_policy;

    //rules
    public function rules(): array
    {
        return \App\Models\Contact::rules();
    }
    public function submit(): void
    {
        $data = $this->validate();
        \App\Models\Contact::create($data);

        $this->dispatch('notify_success', 'Your Message Send Successfully');
        $this->reset();
    }

    public function render(): View
    {
        return view('front.pages.contact')->layout('front.layout.master' , [
            'title' => 'Hotel Contact'
        ]);
    }
}
