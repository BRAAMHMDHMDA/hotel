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
                            <a wire:navigate href="{{ route('home') }}" class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('gallery') }}" class="nav-link {{ Request::routeIs('gallery') ? 'active' : '' }}">
                                Gallery
                            </a>
                        </li>

                        <li class="nav-item">
                            <a wire:navigate href="{{route('blog')}}" class="nav-link {{ Request::routeIs('blog') ? 'active' : '' }}">
                                Blog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a wire:navigate href="{{ route('rooms') }}" class="nav-link {{ Request::routeIs('rooms') ? 'active' : '' }}">
                                Rooms
                            </a>
                        </li>

                        <li class="nav-item">
                            <a wire:navigate href="{{ route('contact') }}" class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}">
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
