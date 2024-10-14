<?php

namespace App\Livewire\Front\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{

    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    public function authenticate(): void
    {
        if (!Auth::guard('web')->attempt($this->only(['email', 'password']), $this->remember)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

    }

    public function submit()
    {
        $this->validate();
        $this->authenticate();
        Session::regenerate();
        $this->redirectIntended(route('home'), navigate: true);
    }

    public function render()
    {
        return view('front.auth.components.login-form');
    }
}
