<?php

namespace App\Livewire\Front\Blog;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $category;

    public function mount(BlogCategory $category): void
    {
        if ($category->exists) {
            $this->category = $category;
        }
    }
    private function getPosts()
    {
        if ($this->category) {
            return $this->category->posts()->published()->latest()->paginate(5);
        }
        return BlogPost::published()->latest()->paginate(1);
    }

    public function render(): View
    {
        return view('front.blog.index', [
//            'categories' => BlogCategory::latest()->take(5)->get(),
//            'recentPosts' => BlogPost::published()->select('id', 'title', 'slug', 'image_path')->latest()->take(3)->get(),
            'posts' => $this->getPosts(),
        ])->layout('front.layout.master' , [
                'title' => 'Hotel Blog'
            ]);
    }

}
