<?php

namespace App\Livewire\Dashboard\BlogPosts;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $title, $image, $old_image, $short_description, $content, $status, $blog_category_id;
    public $categories, $blogPost;

    public function mount(BlogPost $blogPost): void
    {
        $this->categories = BlogCategory::pluck('name', 'id')->toArray();
        $this->blogPost = $blogPost;

        $this->title = $blogPost->title;
        $this->old_image = $blogPost->image_url;
        $this->short_description = $blogPost->short_description;
        $this->content = $blogPost->content;
        $this->status = $blogPost->status;
        $this->blog_category_id = $blogPost->blog_category_id;
    }

    public function rules() :array
    {
        return BlogPost::rules($this->blogPost->id);
    }

    public function submit(): void
    {
        $data = $this->validate();
        $data = BlogPost::updateImage($data, $this->old_image);
        $this->blogPost->update($data);

        $this->redirectRoute('dashboard.blog-posts', navigate: true);
        $this->dispatch('notify_success', "Blog-Post Updated Successfully");
    }

    public function render()
    {
        $this->authorize('blog_post-edit');
        return view('dashboard.blog-posts.edit')->layout('dashboard.layout.dashboard-layout');
    }
}
