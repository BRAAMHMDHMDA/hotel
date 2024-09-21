<?php

namespace App\Livewire\Dashboard\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LogoutForm extends Component
{
    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::invalidate();
        Session::regenerateToken();

        return $this->redirect(route('dashboard.login'), navigate: true);
    }

    public function render()
    {
        return view('dashboard.auth.logout-form');
    }
}
