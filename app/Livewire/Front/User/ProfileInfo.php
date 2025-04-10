<?php

namespace App\Livewire\Front\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileInfo extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $phone, $email, $image, $old_image, $city;

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255', 'min:3'],
            'phone' => ['nullable', 'numeric'],
            'image' => ['nullable', 'image'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ];
    }

    public function mount()
    {
        $user = Auth::user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->old_image = $user->image_url;
        $this->city = $user->city;
    }

    public function submit()
    {
        $data = $this->validate();
        $data = User::UpdateImage($data, $this->old_image);
        $res = Auth::user()->update($data);
        $this->resetValidation();
    }

    public function render()
    {
        return view('front.user.profile')
            ->layout('front.layout.master', ['title' => 'Profile Information']);
    }
}
