<div>

    <!-- Inner Banner -->
    @include('front.layout.sections._banner', ['current_page'=> 'Rooms'])
    <!-- Inner Banner End -->

    <!-- Room Area -->
    <div class="room-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">ROOMS</span>
                <h2>Our Rooms & Rates</h2>
            </div>
            <div class="row pt-45">

                @empty(count($rooms))
                    <div class="alert alert-info fw-bold fs-5" style="margin: 50px 0 200px">There Are No Rooms Available.</div>
                @else
                    @foreach($rooms as $room)
                        <div class="col-lg-4 col-md-6">
                            <div class="room-card">
                                @isset($checkIn)
                                    <a wire:navigate href="{{route('room.show',$room->slug)}}?checkIn={{$checkIn}}&checkOut={{$checkOut}}&guests={{$guests}}">
                                        <img src="{{$room->image_url}}" alt="Images">
                                    </a>
                                @else
                                    <a wire:navigate href="{{route('room.show',$room->slug)}}">
                                        <img src="{{$room->image_url}}" alt="Images">
                                    </a>
                                @endisset
                                <div class="content">
                                    <h3>
                                        @isset($checkIn)
                                            <a wire:navigate href="{{route('room.show',$room->slug)}}?checkIn={{$checkIn}}&checkOut={{$checkOut}}&guests={{$guests}}">
                                                {{$room->name}}
                                            </a>
                                        @else
                                            <a wire:navigate href="{{route('room.show',$room->slug)}}">
                                                {{$room->name}}
                                            </a>
                                        @endisset
                                    </h3>
                                    <div class="rating text-color">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star-half'></i>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <ul>
                                            <li class="text-color">{{$room->price}}$</li>
                                            <li class="text-color">Per Night</li>
                                        </ul>
                                        @isset($room->available_rooms)
                                            <div class="text-muted" style="font-size: 13px">
                                                Available Rooms: <span class="text-color">{{$room->available_rooms}}</span>
                                            </div>
                                        @endisset
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                @endempty

            </div>
        </div>
    </div>
    <!-- Room Area End -->

</div>
