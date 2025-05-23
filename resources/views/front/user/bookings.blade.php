<div>

    @include('front.layout.sections._banner', ['current_page' => 'My Bookings'])

    <!-- Service Details Area -->
    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('front.user.components._sidebar')
                </div>

                <div class="col-lg-9">
                    <div class="service-article">
                        <section class="checkout-area pb-70">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-details">
                                            <h3 class="title">Bookings List</h3>
                                            <div class="row">
                                                <table class="table table-bordered text-center">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">Code</th>
                                                        <th scope="col">Room</th>
                                                        <th scope="col">Count</th>
                                                        <th scope="col">Chk In/Out</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Pay</th>
                                                        <th scope="col">P.Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($bookings as $booking)
                                                        <tr>
                                                            <td>{{ $booking->code }}</td>
                                                            <td> <span class="badge bg-secondary-subtle text-black">{{ $booking->roomType->name }}</span></td>
                                                            <td>{{ $booking->number_of_rooms }}</td>
                                                            <td>
                                                                <span class="badge bg-light text-black">{{$booking->check_in->format('d-m-Y') }}</span>
                                                                <br>/
                                                                <span class="badge bg-light text-black">{{$booking->check_out->format('d-m-Y') }}</span>
                                                            </td>
                                                            <td>
                                                                @if($booking->status == 'pending')
                                                                    <span class="badge bg-warning">Pending</span>
                                                                @elseif($booking->status == 'confirmed')
                                                                    <span class="badge bg-success">Confirmed</span>
                                                                @elseif($booking->status == 'cancelled')
                                                                    <span class="badge bg-danger">Canceled</span>
                                                                @elseif($booking->status == 'completed')
                                                                    <span class="badge bg-info">Completed</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $booking->payment_method }}</td>
                                                            <td>
                                                                @if($booking->payment_status == 'pending')
                                                                    <span class="badge bg-warning">Pending</span>
                                                                @elseif($booking->payment_status == 'confirmed')
                                                                    <span class="badge bg-success">Confirmed</span>
                                                                @elseif($booking->payment_status == 'cancelled')
                                                                    <span class="badge bg-danger">Canceled</span>
                                                                @elseif($booking->payment_status == 'completed')
                                                                    <span class="badge bg-info">Completed</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($booking->status == 'pending' && $booking->payment_method !== 'stripe')
                                                                    <button wire:click="cancel({{ $booking->id }})" class="btn text-danger fs-5" title="Cancel Booking">
                                                                        <i class="bx bx-task-x"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service Details Area End -->

</div>
