<?php

namespace App\View\Components\Front\Blog;

use App\Models\BlogPost;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentPosts extends Component
{
    public function render(): View|Closure|string
    {
        return view('front.blog.components.recent-posts', [
            'posts' => BlogPost::published()->select('id', 'title', 'slug', 'image_path')->latest()->take(3)->get()
        ]);
    }
}
