<!-- Testimonials Area Another -->
<div class="testimonials-area-another pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Latest Testimonials and What Our Client Says</h2>
        </div>
        <div class="testimonials-slider-three owl-carousel owl-theme pt-45">
            @foreach($testimonials as $testimonial)
                <div class="testimonials-item">
                    <i class="flaticon-left-quote text-color"></i>
                    <p style="height: 200px; overflow-y: auto;">
                        {{$testimonial->message}}
                    </p>
                    <ul>
                        <li>
                            <img src="{{$testimonial->image_url}}" alt="Images">
                            <h3>{{$testimonial->name}}</h3>
                            <span>{{$testimonial->city}}</span>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonials Area Another End -->
