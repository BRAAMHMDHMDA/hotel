<?php

namespace App\Livewire\Dashboard\BlogPosts;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\RoomType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $title, $image, $short_description, $content, $status, $blog_category_id;
    public $categories = [];

    public function mount(): void
    {
        $this->categories = BlogCategory::pluck('name', 'id')->toArray();
    }

    public function rules() :array
    {
        return BlogPost::rules();
    }

    public function submit()
    {
        $data= $this->validate();
        BlogPost::create(BlogPost::storeImage($data));

        $this->dispatch('notify_success', "Blog-Post Added Successfully");
        $this->redirectRoute('dashboard.blog-posts', navigate: true);
    }

    public function render()
    {
        $this->authorize('blog_post-list');
        return view('dashboard.blog-posts.create')->layout('dashboard.layout.dashboard-layout');
    }
}
