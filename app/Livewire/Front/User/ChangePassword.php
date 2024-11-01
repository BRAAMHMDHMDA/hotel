<?php

namespace App\Livewire\Front\User;

use Livewire\Component;

class ChangePassword extends Component
{
    public function render()
    {
        return view('front.user.change-password')
            ->layout('front.layout.master', ['title' => 'Change Password']);
    }
}
