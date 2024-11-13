<?php

namespace App\Livewire\Front\Pages;

use App\Models\Gallery as GalleryModel;
use Livewire\Component;
use Livewire\WithPagination;

class Gallery extends Component
{
    use WithPagination;

    private function getImages()
    {
        return GalleryModel::active()->latest()->paginate(9);
    }

    public function render()
    {
        return view('front.pages.gallery', [
            'images' => $this->getImages(),
        ])->layout('front.layout.master' , [
            'title' => 'Hotel Gallery'
        ]);
    }
}