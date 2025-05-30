<div>

    <!-- Inner Banner -->
    @include('front.layout.sections._banner', ['current_page'=> 'Post Details'])
    <!-- Inner Banner End -->

    <!-- Blog Details Area -->
    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-article">
                        <div class="blog-article-img">
                            <img src="{{$post->image_url}}" alt="Images">
                        </div>

                        <div class="blog-article-title">
                            <h2>{{$post->title}}</h2>
                            <ul>

                                <li>
                                    <i class='bx bx-user'></i>
                                    By {{$post->author->name}}
                                </li>

                                <li>
                                    <i class='bx bx-calendar'></i>
                                    {{$post->created_at->format('F j, Y')}}
                                </li>
                            </ul>
                        </div>

                        <div class="article-content">
                            {!! $post->content !!}
                        </div>

                        <div class="comments-wrap">
                            <h3 class="title">Comments</h3>
                            <ul>
                                @foreach($post->comments as $comment)
                                    <li>
                                        <img src="{{$comment->user->image_url}}" alt="Image" width="60px" height="60px">
                                        <h3>{{$comment->user->full_name}}</h3>
                                        <span>
                                            {{ $comment->created_at->diffForHumans() }}
{{--                                            October 14, 2020, 12:10 PM--}}
                                        </span>
                                        <p>
                                            {{ $comment->content }}
                                        </p>

                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="comments-form">
                            <div class="contact-form">
                                <h2>Leave A Comment</h2>
                                @auth
                                    <form wire:submit.prevent="post_comment">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <textarea wire:model="comment"
                                                              class="form-control @if($errors->has('comment')) is-invalid @endif"
                                                              id="message" cols="30" rows="8" required
                                                              placeholder="Your Comment"
                                                    ></textarea>
                                                    @error('comment')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-md-12">
                                                <x-front.form.submit-btn class="default-btn btn-bg-three">
                                                    Post A Comment
                                                </x-front.form.submit-btn>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <p>
                                        Plz <a wire:navigate href="{{route('login')}}">Login</a> to Leave a Comment
                                    </p>
                                @endauth
                            </div>
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
    <!-- Blog Details Area End -->

</div>
