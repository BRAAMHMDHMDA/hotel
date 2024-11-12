<?php

namespace App\Livewire\Front\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    private function getImages()
    {
        return Gallery::active()->latest()->paginate(9);
    }

    public function render()
    {
        return view('front.gallery.index', [
            'images' => $this->getImages(),
        ])->layout('front.layout.master' , [
            'title' => 'Hotel Gallery'
        ]);
    }
}
