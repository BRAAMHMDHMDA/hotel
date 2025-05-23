<!-- Blog Area -->
<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">BLOGS</span>
            <h2>Our Latest Blogs to the Intranational Journal at a Glance</h2>
        </div>
        <div class="row pt-45">
            @foreach($blog_posts as $post)
                <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <a href="{{route('post.details', $post->slug)}}">
                        <img src="{{$post->image_url}}" alt="Images">
                    </a>
                    <div class="content">
                        <ul>
                            <li>{{$post->created_at->format('F d, Y') }}</li>
{{--                            <li><i class='bx bx-user'></i>22K</li>--}}
{{--                            <li><i class='bx bx-message-alt-dots'></i>24K</li>--}}
                        </ul>
                        <h3>
                            <a href="{{route('post.details', $post->slug)}}">{{$post->title}}</a>
                        </h3>
                        <p>{{$post->short_description}}</p>
                        <a href="{{route('post.details', $post->slug)}}" class="read-btn">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
{{--            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">--}}
{{--                <div class="blog-item">--}}
{{--                    <a href="#">--}}
{{--                        <img src="{{ asset('front_assets/img/blog/blog-item-img3.jpg') }}" alt="Images">--}}
{{--                    </a>--}}
{{--                    <div class="content">--}}
{{--                        <ul>--}}
{{--                            <li>October 17, 2020</li>--}}
{{--                            <li><i class='bx bx-user'></i>27K</li>--}}
{{--                            <li><i class='bx bx-message-alt-dots'></i>39K</li>--}}
{{--                        </ul>--}}
{{--                        <h3>--}}
{{--                            <a href="#">Hotel Management Has a Good Future Era</a>--}}
{{--                        </h3>--}}
{{--                        <p>This is one of the best & quality full hotels in the world that will help you to make an excellent study market.</p>--}}
{{--                        <a href="#" class="read-btn">--}}
{{--                            Read More--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<!-- Blog Area End -->
