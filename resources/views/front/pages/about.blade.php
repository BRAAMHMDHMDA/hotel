<x-front.front-layout title="About Us">

    <!-- Inner Banner -->
    @include('front.layout.sections._banner', ['current_page'=> 'About'])
    <!-- Inner Banner End -->


    <!-- Ability Area -->
    <div class="ability-area  pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="ability-content">
                        <div class="section-title">
                            <h2>Our Ability to the Global and International Market</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt ante tellus,
                                sit amet rhoncus massa aliquam sit amet. Cras porttitor mauris quis mattis ornare.
                                In efficitur at sem quis pretium. Aenean sit amet neque ut dolor lacinia rutrum.
                                In vulputate pellentesque turpis et porta.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="ability-counter">
                                    <h3 class="text-color">14K</h3>
                                    <p>5 Star Retting Reviews</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="ability-counter">
                                    <h3 class="text-color">225K</h3>
                                    <p>Items Served Breakfast</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="ability-img-2">
                        <img src="{{ asset('front_assets/img/ability-img2.jpg') }}" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ability Area  End -->

    <!-- Choose Area -->
    <div class="choose-area section-bg pb-70 pt-100">
        <div class="container">
            <div class="section-title text-center">
                <h2>Why You Choose Our Hotel & Resort Form the All of the Other's</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-4 col-md-6">
                    <div class="choose-card">
                        <i class="flaticon-restaurant"></i>
                        <h3>Restaurant Facilities</h3>
                        <p>We are one of the best company in the global market and we have restaurant facilities for all of our guide</p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="choose-card">
                        <i class="flaticon-wifi-signal-1"></i>
                        <h3>Free Wifi Facilities</h3>
                        <p>
                            This is the place where I will get a free wifi zone at a reasonable price and this will
                            help you to make a colorful life
                        </p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="choose-card">
                        <i class="flaticon-fireworks"></i>
                        <h3>5 Stars Rettings</h3>
                        <p>
                            Atoli is well known agency and the agency is one of the best by 5-star retting and
                            we will be benefited .
                        </p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Choose Area End -->

    <!-- Specialty Area Two -->
    <div class="specialty-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="specialty-img-3">
                        <img src="{{ asset('front_assets/img/specialty/specialty-img3.jpg') }}" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="specialty-list">
                        <div class="section-title">
                            <h2>Our Specialization Sectors & All of the Other Details</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="specialty-list-card">
                                    <i class="text-color flaticon-decoration"></i>
                                    <h3>Well Decoration</h3>
                                    <p>We are very careful about our room and all of the resort decorations. So, try us.</p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="specialty-list-card">
                                    <i class="text-color flaticon-champagne-glass"></i>
                                    <h3>Luxury Bar</h3>
                                    <p>You can easily enjoy free access to a superstar bar at a reasonable price.</p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="specialty-list-card">
                                    <i class="text-color flaticon-fireworks"></i>
                                    <h3>5 Stars Rettings</h3>
                                    <p>Atoli is a Well Known Agency and the Agency is One of the Best by 5 Star Retting. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Specialty Area Two End -->

    <!-- Team Area Two -->
    <x-front.sections.team />
    <!-- Team Area Two End -->

    <!-- Testimonials Area Another -->
    <x-front.sections.testimonials />
    <!-- Testimonials Area Another End -->
</x-front.front-layout>
