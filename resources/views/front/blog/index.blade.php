<div>

    <!-- Inner Banner -->
    @include('front.layout.sections._banner', ['current_page'=> 'Blog'])
    <!-- Inner Banner End -->

    <!-- Blog Style Area -->
    <div class="blog-style-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @foreach($posts as $post)
                        <div class="col-lg-12">
                            <div class="blog-card">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 col-md-4 p-0">
                                        <div class="blog-img">
                                            <a wire:navigate href="{{route('post.details', $post->slug)}}">
                                                <img src="{{$post->image_url}}" alt="Images">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-8 p-0">
                                        <div class="blog-content">
                                            <span>{{$post->created_at->format('M d, Y')}}</span>
                                            <h3>
                                                <a wire:navigate href="{{route('post.details', $post->slug)}}">{{$post->title}}</a>
                                            </h3>
                                            <p>{{$post->short_description}}</p>
                                            <a wire:navigate href="{{route('post.details', $post->slug)}}" class="read-btn">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            {{$posts->links('front.layout.sections._pagination')}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="side-bar-wrap">
                        <div class="search-widget">
                            <form class="search-form">
                                <input type="search" class="form-control" placeholder="Search...">
                                <button type="submit">
                                    <i class="bx bx-search"></i>
                                </button>
                            </form>
                        </div>

                        <x-front.blog.categories />

                        <x-front.blog.recent-posts />

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Style Area End -->

</div>
