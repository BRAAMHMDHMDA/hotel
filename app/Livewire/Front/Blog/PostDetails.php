<?php

namespace App\Livewire\Front\Blog;

use App\Models\BlogPost;
use Illuminate\View\View;
use Livewire\Component;

class PostDetails extends Component
{
    public $post;

    public function mount(BlogPost $post): void
    {
        $this->post = $post;
    }

    public function render(): View
    {
        return view('front.blog.post-details')->layout('front.layout.master' , [
            'title' => $this->post->title
        ]);
    }
}
