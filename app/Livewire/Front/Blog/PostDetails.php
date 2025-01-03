<?php

namespace App\Livewire\Front\Blog;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\View\View;
use Livewire\Component;

class PostDetails extends Component
{
    public $post, $comments;
    public $comment;

    public function mount(BlogPost $post): void
    {
        $this->post = $post->load('comments')->load('author');
    }

    public function post_comment(): void
    {
        $this->validate(['comment' => 'required|string|min:5|max:255']);
        Comment::create([
            'content' => $this->comment,
            'post_id' => $this->post->id,
        ]);
        $this->reset('comment');
        $this->dispatch('notify_success', 'Comment Added Successfully, Please Wait For Admin Approval');
    }

    public function render(): View
    {
        return view('front.blog.post-details')->layout('front.layout.master' , [
            'title' => $this->post->title
        ]);
    }
}
