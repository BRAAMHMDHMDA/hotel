<?php

namespace App\Livewire\Front\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $first_name, $last_name, $email, $password, $password_confirmation;

    public function rules()
    {
       return[
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }

    public function register()
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($validated['password']);
        event(new Registered($user = User::create($validated)));
        Auth::login($user);

        $this->redirect(route('home'), navigate: false);
    }

    public function render()
    {
        return view('front.auth.components.register-form');
    }
}
