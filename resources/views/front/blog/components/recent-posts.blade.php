<div class="side-bar-widget">
    <h3 class="title">Recent Posts</h3>
    <div class="widget-popular-post">
        @foreach($posts as $post)
            <article class="item">
                <a wire:navigate href="{{route('post.details', $post->slug)}}" class="thumb">
                    <img src="{{$post->image_url}}" class="full-image cover bg1 img-fluid rounded" />
                </a>
                <div class="info">
                    <h4 class="title-text">
                        <a wire:navigate href="{{route('post.details', $post->slug)}}">
                            {{$post->title}}
                        </a>
                    </h4>
                    <ul>
                        <li>
                            <i class='bx bx-user'></i>
                            By {{$post->author->name}}
                        </li>
                    </ul>
                </div>
            </article>
        @endforeach
    </div>
</div>
