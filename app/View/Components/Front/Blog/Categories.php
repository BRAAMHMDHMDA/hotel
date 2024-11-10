<?php

namespace App\View\Components\Front\Blog;

use App\Models\BlogCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Categories extends Component
{
    public function render(): View|Closure|string
    {
        return view('front.blog.components.categories', [
            'categories' => BlogCategory::latest()->take(5)->get()
        ]);
    }
}
