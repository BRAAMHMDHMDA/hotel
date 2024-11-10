<!-- Start Navbar Area -->
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a wire:navigate href="{{route('home')}}" class="logo">
            <img src="{{ asset('front_assets/img/logos/logo-1.png') }}" class="logo-one" alt="Logo">
            <img src="{{ asset('front_assets/img/logos/footer-logo1.png') }}" class="logo-two" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" wire:navigate href="{{route('home')}}">
                    <img src="{{ asset('front_assets/img/logos/logo-1.png') }}" class="logo-one" alt="Logo">
                    <img src="{{ asset('front_assets/img/logos/footer-logo1.png') }}" class="logo-two" alt="Logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a wire:navigate href="{{route('home')}}"  class="nav-link active">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Pages
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Booking
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Team
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        FAQ
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Restaurant
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Reservation
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Gallery
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Testimonials
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Check out
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Sign In
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Sign Up
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Terms & Conditions
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Privacy Policy
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        404 page
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Coming Soon
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Services
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Services Style One
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Services Style Two
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Service Details
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a wire:navigate href="{{route('blog')}}" class="nav-link">
                                Blog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a wire:navigate href="{{ route('rooms') }}" class="nav-link">
                                Rooms
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Contact
                            </a>
                        </li>

                        <li class="nav-item-btn">
                            @if(session('bookingData'))
                                <a wire:navigate href="{{route('checkout')}}" class="default-btn btn-bg-one border-radius-5">Book Now</a>
                            @else
                                <a wire:navigate href="{{route('rooms')}}" class="default-btn btn-bg-one border-radius-5">Book Now</a>
                            @endif
                        </li>
                    </ul>

                    <div class="nav-btn">
                        @if(session('bookingData'))
                            <a wire:navigate href="{{route('checkout')}}" class="default-btn btn-bg-one border-radius-5">Book Now</a>
                        @else
                            <a wire:navigate href="{{route('rooms')}}" class="default-btn btn-bg-one border-radius-5">Book Now</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
