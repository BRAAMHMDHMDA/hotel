<?php

namespace App\View\Components\Front\Blog;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Categories extends Component
{
    private function getCategories()
    {
        return Cache::remember('random5_blog_categories', now()->addMinutes(30), function () {
            return BlogCategory::inRandomOrder()->take(5)->get();
        });
    }
    public function render(): View|Closure|string
    {
        return view('front.blog.components.categories', [
            'categories' => $this->getCategories()
        ]);
    }
}
