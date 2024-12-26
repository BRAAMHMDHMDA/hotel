<?php

namespace App\Livewire\Front\Blog;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $category, $search;

    // Add search to the query string
    protected $queryString = [
        'search' => ['except' => ''], // Default to an empty string when not set
    ];

    public function mount(BlogCategory $category): void
    {
        if ($category->exists) {
            $this->category = $category;
        }
    }

    private function getPosts()
    {
        $query = BlogPost::published()->latest();

        // Filter by category if it exists
        if ($this->category) {
            $query->where('blog_category_id', $this->category->id);
        }
        // Apply search filter if search term is provided
        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }
        // Paginate the results
        return $query->paginate(5);
    }

    public function render(): View
    {
        return view('front.blog.index', [
            'posts' => $this->getPosts(),
        ])->layout('front.layout.master' , [
                'title' => 'Hotel Blog'
            ]);
    }

}
