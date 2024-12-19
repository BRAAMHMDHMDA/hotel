<div>

    <x-dashboard.breadcrumb mainTitle="Create New Booking" />
{{$errors}}

    <div class="card">
        <div class="card-body mt-3">
            <form class="row g-3" wire:submit.prevent="submit">
                @csrf
                <div class="col-md-4">
                    <x-dashboard.form.select label="Room Type" :options="$room_types" name="room_type_id"/>
                </div>
                <div class="col-md-4">
                    <x-dashboard.form.input-flatpicker name="check_in" label="Check In"/>
                </div>
                <div class="col-md-4">
                    <x-dashboard.form.input-flatpicker name="check_out" label="Check Out"/>
                </div>

                <div class="col-md-4">
                    <x-dashboard.form.input name="persons" label="Number of Guests" type="number" placeholder="0" min="1" max="{{$maximum_persons}}"/>
                </div>
                <div class="col-md-4">
                    <x-dashboard.form.input name="number_of_rooms" wire:model.live="number_of_rooms" label="Number of Rooms" type="number" placeholder="0" min="1" max="{{$available_rooms}}"/>
                </div>
                @if(!is_null($available_rooms))
                    <div class="col-md-4 align-self-end bg-warning-subtle w-auto rounded-pill">
                        Available Rooms:  <span class="text-color">{{$available_rooms}}</span>
                    </div>
                @endif

                <div class="col-12 mt-4">

                    <table class="table table-bordered">
                        <thead class="table-light">
                            <th>Room Price</th>
                            <th>Rooms</th>
                            <th>Nights</th>
                            <th>SubTotal</th>
                            <th>Discount</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-18">{{$roomTypeSelected?->price}} $</td>
                                <td class="font-18">{{$number_of_rooms??0}} Room(s)</td>
                                <td class="font-18">{{$total_night??0}} Night(s)</td>
                                <td class="font-18">{{$sub_total??0}} $</td>
                                <td class="font-18">{{$discount??0}} $</td>
                                <td class="font-18">{{$total_price??0}} $</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 text-center">
                    <h3>Customer Information</h3>
                </div>

                <div class="col-md-4">
                    <x-dashboard.form.input name="name" label="Name"/>
                </div>
                <div class="col-md-4">
                    <x-dashboard.form.input name="email" label="Email" type="email"/>
                </div>
                <div class="col-md-4">
                    <x-dashboard.form.input name="phone" label="Phone"/>
                </div>

                <div class="col-md-3">
                    <x-dashboard.form.input name="country" label="Country"/>
                </div>
                <div class="col-md-3">
                    <x-dashboard.form.input name="state" label="State"/>
                </div>
                <div class="col-md-4">
                    <x-dashboard.form.input name="address" label="Address"/>
                </div>
                <div class="col-md-2">
                    <x-dashboard.form.input name="zip_code" label="Zip Code"/>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <x-dashboard.form.btn-submit label="Create"  />
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
@script
    <script>
        flatpickr("#check_in", {
            minDate: "today",
            onChange: function (selectedDates) {
                let endDatePicker = document.querySelector("#check_out")._flatpickr;

                // Set minimum date for end date picker to the day after selected start date
                if (selectedDates.length > 0) {
                    let selectedDate = new Date(selectedDates[0]);
                    selectedDate.setDate(selectedDate.getDate() + 1);
                    endDatePicker.set("minDate", selectedDate);
                }
                endDatePicker.clear();
            }
        });
    </script>
@endscript
