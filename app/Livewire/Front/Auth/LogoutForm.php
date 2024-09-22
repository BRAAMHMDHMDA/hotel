<?php

namespace App\Livewire\Front\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LogoutForm extends Component
{
    public function logout()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();

        return $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('front.auth.components.logout-form');
    }
}
