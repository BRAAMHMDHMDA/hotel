<?php

namespace App\Livewire\Front\Home;

use Illuminate\View\View;
use Livewire\Component;

class CheckAvailabilityForm extends Component
{
    public $checkIn, $checkOut, $guests;


    public function rules()
    {
        return [
            'checkIn' => ['required', 'date', 'after_or_equal:today'],
            'checkOut' => ['required', 'date', 'after_or_equal:checkIn'],
            'guests' => ['required', 'integer', 'min:1'],
        ];
    }
    public function submit(): void
    {
        $this->validate();
        $this->redirectRoute(
            'rooms',
            ['checkIn' => $this->checkIn, 'checkOut' => $this->checkOut, 'guests' => $this->guests],
            navigate: true
        );
    }

    public function render(): View
    {
        return view('front.home.sections.check-availability-form');
    }
}
