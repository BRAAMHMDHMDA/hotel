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
                        <div class="room-details-slider owl-carousel owl-theme" wire:ignore>
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
                                        <h3 class="title">Room Dimensions</h3>
                                        <div class="side-bar-list">
                                            <ul>
                                                <li>
                                                    <a> <b>Capacity : </b> {{$room_type->capacity}} Person </a>
                                                </li>
                                                <li>
                                                    <a> <b>Size : </b> {{$room_type->size}}M²</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="services-bar-widget">
                                        <h3 class="title">Details</h3>
                                        <div class="side-bar-list">
                                            <ul>
                                                <li>
                                                    <a> <b>View : </b> {{$room_type->view}} </a>
                                                </li>
                                                <li>
                                                    <a> <b>Bad Style : </b> {{$room_type->bed_style}} </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

{{--                        <div class="room-details-review">--}}
{{--                            <h2>Clients Review and Retting's</h2>--}}
{{--                            <div class="review-ratting">--}}
{{--                                <h3>Your retting: </h3>--}}
{{--                                <i class='bx bx-star'></i>--}}
{{--                                <i class='bx bx-star'></i>--}}
{{--                                <i class='bx bx-star'></i>--}}
{{--                                <i class='bx bx-star'></i>--}}
{{--                                <i class='bx bx-star'></i>--}}
{{--                            </div>--}}
{{--                            <form >--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <textarea name="message" class="form-control"  cols="30" rows="8" required data-error="Write your message" placeholder="Write your review here.... "></textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <button type="submit" class="default-btn btn-bg-three">--}}
{{--                                            Submit Review--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Details Area End -->

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
