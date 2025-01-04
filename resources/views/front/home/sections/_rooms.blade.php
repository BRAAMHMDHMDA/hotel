<!-- Room Area -->
<div class="room-area pt-100 pb-70 section-bg" style="">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">ROOMS</span>
            <h2>Our Rooms & Rates</h2>
        </div>
        <div class="row pt-45">
            @foreach($rooms as $room)
                <div class="col-lg-6">
                    <div class="room-card-two">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4 p-0">
                                <div class="room-card-img">
                                    <a wire:navigate href="{{ route('room.show', $room->slug) }}" >
                                        <img src="{{ $room->image_url }}" alt="Images">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-8 p-0">
                                <div class="room-card-content">
                                    <h3>
                                        <a wire:navigate href="{{ route('room.show', $room->slug) }}" >{{ $room->name }}</a>
                                    </h3>
                                    <span>{{$room->price}}$ / Per Night </span>
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
{{--                                    <div style="height: 100px; overflow: hidden;" >--}}
{{--                                        <p>{{$room->short_description}}</p>--}}
{{--                                    </div>--}}
                                    <ul class="mt-4">
                                        <li ><i class='bx bx-user'></i> {{$room->capacity}} Person</li>
                                        <li ><i class='bx bx-expand'></i> {{$room->size}}</li>
                                    </ul>

                                    <ul class="">
                                        <li ><i class='bx bx-show-alt'></i> {{$room->view}}</li>
                                        <li ><i class='bx bxs-hotel'></i> {{$room->bed_style}}</li>
                                    </ul>

                                    <a wire:navigate href="{{ route('room.show', $room->slug) }}" class="book-more-btn">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Room Area End -->
