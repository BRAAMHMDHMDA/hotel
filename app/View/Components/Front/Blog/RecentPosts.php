<?php

namespace App\View\Components\Front\Blog;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class RecentPosts extends Component
{
    private function getPosts()
    {
        return Cache::remember('random3_blog_posts', now()->addMinutes(30), function () {
            return BlogPost::with('author')->inRandomOrder()->take(3)->get();
        });
    }
    public function render(): View|Closure|string
    {
        return view('front.blog.components.recent-posts', [
            'posts' => $this->getPosts()
        ]);
    }
}
