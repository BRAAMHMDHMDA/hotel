<?php

namespace App\Livewire\Dashboard\BlogCategories;

use App\Models\BlogCategory;
use Livewire\Component;

class Edit extends Component
{
    protected $listeners = ['editBlogCategory'];

    public $name, $blogCategory;

    public function rules() :array
    {
        return BlogCategory::rules($this->blogCategory->id);
    }

    public function editBlogCategory($id): void
    {
        $this->blogCategory = BlogCategory::find($id);
        $this->name = $this->blogCategory->name;

        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }

    public function submit(): void
    {
        $data = $this->validate();
        $this->blogCategory->update($data);

        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(index::class);
        $this->dispatch('notify_success', "Blog-Category Updated Successfully");
        $this->reset();
    }

    public function render()
    {
        $this->authorize('blog_category-edit');
        return view('dashboard.blog-categories.edit');
    }
}
