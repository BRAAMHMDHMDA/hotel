<!-- Top Header Start -->
<header class="top-header top-header-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-2 pr-0"></div>

            <div class="col-lg-9 col-md-10">
                <div class="header-right">
                    <ul>
                        <li>
                            <i class='bx bx-home-alt'></i>
                            <a href="#">{{config('contact.address')}}</a>
                        </li>
                        <li>
                            <i class='bx bx-phone-call'></i>
                            <a href="tel:{{config('contact.phone')}}">{{config('contact.phone')}}</a>
                        </li>
                        @auth
                            <li>
                                <a href="{{route('user.dashboard')}}" wire:navigate>
                                    <i class='bx bx-envelope'></i>
                                    My Dashboard
                                </a>
                            </li>
                            <li>
                                <livewire:front.auth.logout-form />
                            </li>
                        @else
                            <li>
                                <i class='bx bx-envelope'></i>
                                <a href="{{route('login')}}" wire:navigate>Login</a>
                            </li>
                            <li>
                                <i class='bx bx-envelope'></i>
                                <a href="{{route('register')}}" wire:navigate>Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Top Header End -->
