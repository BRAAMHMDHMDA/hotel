<?php

namespace App\Livewire\Dashboard\BlogCategories;

use App\Models\BlogCategory;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteBlogCategory'];
    public $blogCategory;

    public function deleteBlogCategory($id): void
    {
        $this->blogCategory = BlogCategory::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit(): void
    {
        $this->blogCategory->delete();

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "Blog-Category Deleted Successfully");
        $this->dispatch('refreshData')->to(index::class);
    }

    public function render()
    {
        return view('dashboard.blog-categories.delete');
    }
}