<?php

namespace App\Livewire\Dashboard\BlogPosts;

use App\Models\BlogPost;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteBlogPost'];
    public $blogPost;

    public function deleteBlogPost($id): void
    {
        $this->blogPost = BlogPost::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit(): void
    {
        $this->blogPost->delete();
        BlogPost::deleteImage($this->blogPost->image_path);

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "Blog-Post Deleted Successfully");
        $this->dispatch('refreshData')->to(Index::class);
    }
    public function render()
    {
        $this->authorize('blog_post-delete');
        return view('dashboard.blog-posts.delete');
    }
}
