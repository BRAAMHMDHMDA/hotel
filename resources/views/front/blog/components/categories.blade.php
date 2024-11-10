<div class="services-bar-widget">
    <h3 class="title">Blog Category</h3>
    <div class="side-bar-categories">
        <ul>
            @foreach($categories as $category)
                <li>
                    <a wire:navigate href="{{route('blog', $category->slug)}}">
                        {{$category->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
