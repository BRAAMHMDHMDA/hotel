<div class="side-bar-widget">
    <h3 class="title">Recent Posts</h3>
    <div class="widget-popular-post">
        @foreach($posts as $post)
            <article class="item">
                <a href="#" class="thumb">
                    <img src="{{$post->image_url}}" class="full-image cover bg1" />
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
                            29K
                        </li>
                        <li>
                            <i class='bx bx-message-square-detail'></i>
                            15K
                        </li>
                    </ul>
                </div>
            </article>
        @endforeach
    </div>
</div>
