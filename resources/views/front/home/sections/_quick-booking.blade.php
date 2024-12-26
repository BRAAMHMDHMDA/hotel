<!-- Book Area Two-->
<div class="book-area-two pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="book-content-two">
                    <div class="section-title">
                        <span class="sp-color">{{$quickBookingArea->short_title}}</span>
                        <h2>{{$quickBookingArea->main_title}}</h2>
                        <p>
                            {{$quickBookingArea->description}}
                        </p>
                    </div>
                    <a href="{{$quickBookingArea->button_link}}" class="default-btn btn-bg-three">{{$quickBookingArea->button_text}}</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="book-img-2">
                    <img src="{{$quickBookingArea->image_url}}" alt="Images">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Book Area Two End -->
