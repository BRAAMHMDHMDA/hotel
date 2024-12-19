<?php

namespace App\Livewire\Dashboard\BlogComments;

use App\Models\Comment;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteBlogComment'];
    public $blogComment;

    public function deleteBlogComment($id): void
    {
        $this->blogComment = Comment::find($id);
        $this->dispatch('deleteModalToggle');
    }
    public function submit(): void
    {
        $this->blogComment->delete();

        $this->dispatch('deleteModalToggle');
        $this->dispatch('notify_success', "Comment Deleted Successfully");
        $this->dispatch('refreshData')->to(index::class);
    }

    public function render()
    {
        $this->authorize('blog_comment-delete');
        return view('dashboard.blog-comments.delete');
    }
}
