<x-front.front-layout title="My Dashboard">
    @include('front.layout.sections._banner', ['current_page' => 'My Dashboard'])


    <!-- Service Details Area -->
    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('front.user.components._sidebar')
                </div>

                <div class="col-lg-9">
                    <div class="service-article">
                        <div class="service-article-title">
                            <h2>My Dashboard</h2>
                        </div>

                        <div class="service-article-content">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="card text-white bg-primary mb-3" >
                                        <div class="card-header">Total Booking</div>
                                        <div class="card-body">
                                            <h1 class="card-title" style="font-size: 45px;">{{Auth::user()->loadCount('bookings')->bookings_count}} Total</h1>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card text-white bg-warning mb-3" >
                                        <div class="card-header">Pending Booking </div>
                                        <div class="card-body">
                                            <h1 class="card-title" style="font-size: 45px;">
                                                {{Auth::user()->loadCount(['bookings as pending_bookings_count' => function ($query) {$query->where('status', 'pending');}])->pending_bookings_count}}
                                                Pending</h1>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="card text-white bg-success mb-3" >
                                        <div class="card-header">Completed Booking</div>
                                        <div class="card-body">
                                            <h1 class="card-title" style="font-size: 45px;">
                                                {{Auth::user()->loadCount(['bookings as complete_bookings_count' => function ($query) {$query->where('status', 'completed');}])->complete_bookings_count}}
                                                Completed</h1>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card text-white bg-danger mb-3" >
                                        <div class="card-header">Cancelled Booking</div>
                                        <div class="card-body">
                                            <h1 class="card-title" style="font-size: 45px;">
                                                {{Auth::user()->loadCount(['bookings as cancel_bookings_count' => function ($query) {$query->where('status', 'cancelled');}])->cancel_bookings_count}} Cancelled</h1>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Service Details Area End -->

</x-front.front-layout>
