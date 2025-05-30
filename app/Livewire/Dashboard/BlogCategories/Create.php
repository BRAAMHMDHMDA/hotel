<?php

namespace App\Livewire\Dashboard\BlogCategories;

use App\Models\BlogCategory;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public function rules() :array
    {
        return BlogCategory::rules();
    }

    public function submit(): void
    {
        $data= $this->validate();
        BlogCategory::create($data);

        $this->dispatch('refreshData')->to(Index::class);
        $this->dispatch('createModalToggle');
        $this->dispatch('notify_success', "Blog-Category Added Successfully");
        $this->reset();
    }

    public function render()
    {
        $this->authorize('blog_category-list');
        return view('dashboard.blog-categories.create');
    }
}
