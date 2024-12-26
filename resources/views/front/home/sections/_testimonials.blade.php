<!-- Testimonials Area Three -->
<div class="testimonials-area-three pb-70" id="testimonials">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">TESTIMONIAL</span>
            <h2>Our Latest Testimonials and What Our Client Says</h2>
        </div>
        <div class="row align-items-center pt-45">
            <div class="col-lg-6 col-md-6">
                <div class="testimonials-img-two">
                    <img src="{{ asset('front_assets/img/testimonials/testimonials-img5.jpg') }}" alt="Images">
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="testimonials-slider-area owl-carousel owl-theme">
                    @foreach($testimonials as $testimonial)
                        <div class="testimonials-slider-content">
                            <i class="flaticon-left-quote"></i>
                            <p>
                                {{$testimonial->message}}
                            </p>
                            <ul>
                                <li>
                                    <img src="{{$testimonial->image_url}}" alt="Images">
                                    <h3>{{$testimonial->name}}</h3>
                                    <span>{{$testimonial->city}} City</span>
                                </li>
                            </ul>
                        </div>
                    @endforeach

{{--                    <div class="testimonials-slider-content">--}}
{{--                        <i class="flaticon-left-quote"></i>--}}
{{--                        <p>--}}
{{--                            You can easily make a good and easily the best service on--}}
{{--                            this agency. This is one of the best and crucial service into--}}
{{--                            the global world. We will start to make a communications--}}
{{--                            with this agency and saw that, this has made our all of the--}}
{{--                            problems in an easiest way.--}}
{{--                        </p>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <img src="{{ asset('front_assets/img/testimonials/testimonials-img2.jpg') }}" alt="Images">--}}
{{--                                <h3>Harriet Johnson</h3>--}}
{{--                                <span>London City</span>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonials Area Three End -->
