<?php

namespace App\Livewire\Dashboard\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Form;
use Illuminate\Support\Facades\Session;


class LoginForm extends Component
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    public int $lockoutTime = 0;

    public function mount()
    {
        $this->lockoutTime = RateLimiter::availableIn($this->throttleKey());
    }
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::guard('admin')->attempt($this->only(['email', 'password']), $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());
        $this->lockoutTime = $seconds;

        // Emit an event to notify the frontend
        $this->dispatch('lockoutStarted', $this->lockoutTime);

        throw ValidationException::withMessages([
            'many_attempts' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }


    public function login()
    {
        $this->validate();
        $this->authenticate();
        Session::regenerate();
        return $this->redirectIntended(route('dashboard.home'), navigate: true);
    }

    public function render()
    {
        return view('dashboard.auth.login-form');
    }
}
