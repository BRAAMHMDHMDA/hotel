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

                                <div class="col-md-4">
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                        <div class="card-header">Total Booking</div>
                                        <div class="card-body">
                                            <h1 class="card-title" style="font-size: 45px;">3 Total</h1>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                        <div class="card-header">Pending Booking </div>
                                        <div class="card-body">
                                            <h1 class="card-title" style="font-size: 45px;">3 Pending</h1>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                        <div class="card-header">Complete Booking</div>
                                        <div class="card-body">
                                            <h1 class="card-title" style="font-size: 45px;">3 Complete</h1>

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
