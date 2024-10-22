<div>
    <!-- Inner Banner -->
    @include('front.layout.sections._banner', ['current_page'=> "Room ($room_type->name)"])
    <!-- Inner Banner End -->

    <!-- Room Details Area End -->
    <div class="room-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="room-details-side">
                        <div class="side-bar-form">
                            <h3>Booking Sheet </h3>
                            <form wire:submit.prevent="submit">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Check in</label>
                                            <div class="input-group">
                                                <input id="startDate" type="text" class="form-control" autocomplete="false" wire:model="checkIn" placeholder="MM/DD/YYYY" required>
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Check Out</label>
                                            <div class="input-group">
                                                <input id="endDate" type="text" class="form-control" autocomplete="false" wire:model="checkOut" placeholder="MM/DD/YYYY" required>
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-between align-items-center">
                                                <span>Numbers of Persons</span>
                                                <span class="text-muted" style="font-size: 12px">Max: <span>{{$room_type->capacity}}</span></span>
                                            </label>
                                            <x-front.form.input name="guests" type="number" placeholder="0" required  min="1" max="{{$room_type->capacity}}"/>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-between align-items-center">
                                                <span>Numbers of Rooms</span>
                                                <span class="text-success" style="font-size: 12px">Available: {{$room_type->available_rooms}}</span>
                                            </label>
                                            <x-front.form.input name="number_of_rooms" type="number" placeholder="0" required min="{{$room_type->available_rooms==0? '0':'1'}}"  max="{{$room_type->available_rooms}}"/>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        @if($room_type->available_rooms=="0")
                                            <button type="button" class="default-btn btn-bg-one border-radius-5" style="cursor: not-allowed" disabled>
                                                No Available any Room
                                            </button>
                                        @else
                                            <x-front.form.submit-btn class="default-btn btn-bg-three border-radius-5">
                                                Book Now
                                            </x-front.form.submit-btn>
                                        @endif

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="room-details-article">
                        <div class="room-details-slider owl-carousel owl-theme">
{{--                            <div class="room-details-item">--}}
{{--                                <img src="{{ $room_type->image_url }}" alt="Images">--}}
{{--                            </div>--}}
                            @foreach($room_type->images as $image)
                                <div class="room-details-item">
                                    <img src="{{ asset('storage/media/' . $image->image_path)}}" alt="Images">
                                </div>
                            @endforeach
                        </div>
                        <div class="room-details-title">
                            <h2>{{$room_type->short_description}}</h2>
                            <ul>

                                <li>
                                    <b> Basic : ${{$room_type->price}} /Night/Room</b>
                                </li>

                            </ul>
                        </div>

                        <div class="room-details-content">
                            <p>
                                {{$room_type->description}}
                            </p>
                            <div class="side-bar-plan">
                                <h3>Basic Plan Facilities</h3>
                                <ul>
                                    @foreach($room_type->facilities as $facility)
                                        <li><a href="#">{{$facility->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="services-bar-widget">
                                        <h3 class="title">Download Brochures</h3>
                                        <div class="side-bar-list">
                                            <ul>
                                                <li>
                                                    <a href="#"> <b>Capacity : </b> {{$room_type->capacity}} Person <i class='bx bxs-cloud-download'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"> <b>Size : </b> {{$room_type->size}}M²<i class='bx bxs-cloud-download'></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="services-bar-widget">
                                        <h3 class="title">Download Brochures</h3>
                                        <div class="side-bar-list">
                                            <ul>
                                                <li>
                                                    <a href="#"> <b>View : </b> {{$room_type->view}} <i class='bx bxs-cloud-download'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"> <b>Bad Style : </b> {{$room_type->bed_style}} <i class='bx bxs-cloud-download'></i></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="room-details-review">
                            <h2>Clients Review and Retting's</h2>
                            <div class="review-ratting">
                                <h3>Your retting: </h3>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                            </div>
                            <form >
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control"  cols="30" rows="8" required data-error="Write your message" placeholder="Write your review here.... "></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-three">
                                            Submit Review
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Details Area End -->

    <!-- Room Details Other -->
    <div class="room-details-other pb-70">
        <div class="container">
            <div class="room-details-text">
                <h2>Our Related Offer</h2>
            </div>

            <div class="row ">
                <div class="col-lg-6">
                    <div class="room-card-two">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4 p-0">
                                <div class="room-card-img">
                                    <a href="room-details.html">
                                        <img src="assets/img/room/room-style-img1.jpg" alt="Images">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-8 p-0">
                                <div class="room-card-content">
                                    <h3>
                                        <a href="room-details.html">Luxury Room</a>
                                    </h3>
                                    <span>320 / Per Night </span>
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, adipiscing elit. Suspendisse et faucibus felis, sed pulvinar purus.</p>
                                    <ul>
                                        <li><i class='bx bx-user'></i> 4 Person</li>
                                        <li><i class='bx bx-expand'></i> 35m2 / 376ft2</li>
                                    </ul>

                                    <ul>
                                        <li><i class='bx bx-show-alt'></i> Sea Balcony</li>
                                        <li><i class='bx bxs-hotel'></i> Kingsize / Twin</li>
                                    </ul>

                                    <a href="room-details.html" class="book-more-btn">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="room-card-two">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4 p-0">
                                <div class="room-card-img">
                                    <a href="room-details.html">
                                        <img src="assets/img/room/room-style-img2.jpg" alt="Images">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-8 p-0">
                                <div class="room-card-content">
                                    <h3>
                                        <a href="room-details.html">Single Room</a>
                                    </h3>
                                    <span>300 / Per Night </span>
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, adipiscing elit. Suspendisse et faucibus felis, sed pulvinar purus.</p>
                                    <ul>
                                        <li><i class='bx bx-user'></i> 1 Person</li>
                                        <li><i class='bx bx-expand'></i> 25m2 / 276ft2</li>
                                    </ul>

                                    <ul>
                                        <li><i class='bx bx-show-alt'></i> Sea Balcony</li>
                                        <li><i class='bx bxs-hotel'></i> Smallsize / Twin</li>
                                    </ul>

                                    <a href="room-details.html" class="book-more-btn">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Details Other End -->
</div>
@script
    <script>
        let setCheckIn = function (date){ $wire.$set('checkIn', date) }
        let setCheckOut = function (date){ $wire.$set('checkOut', date ) }
        let getCheckIn = $wire.$get('checkIn')
        let getCheckOut = $wire.$get('checkOut')

        // Convert the date string into a Date object
        let checkInDate = new Date(getCheckIn);
        // Add one day
        checkInDate.setDate(checkInDate.getDate() + 1);
        // Format the new date back to MM/DD/YYYY
        let checkInDateStr = (checkInDate.getMonth() + 1) + '/' + checkInDate.getDate() + '/' + checkInDate.getFullYear();

        $("#endDate").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            minDate:  checkInDateStr,
            onSelect: function(dateText, inst) {
                setCheckOut(dateText)
            }
        });

        $("#startDate").datepicker({
            minDate:0,
            format: 'yyyy-mm-dd' ,
            autoclose: true,
            onSelect: function(dateText, inst) {
                let endDate = $('#endDate');
                let selectedDay = (parseInt(inst.selectedDay, 10) + 1).toString();

                endDate.datepicker("option", "minDate", new Date(inst.selectedYear, inst.selectedMonth, selectedDay ));
                endDate.val('');
                setCheckIn(dateText)
                setCheckOut(null)
            }
        });
    </script>
@endscript