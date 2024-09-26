<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public string $main_title;
    public array | null $sub_titles;

    public function __construct(string $mainTitle, $subTitles = null)
    {
        $this->main_title = $mainTitle;
        $this->sub_titles = $subTitles;
    }

    public function render(): View
    {
        return view('dashboard.layout.sections.breadcrumb');
    }
}
