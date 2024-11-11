<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('dash_assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{config('app.name')}}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->

    <ul class="metismenu" id="menu">

        <li>
            <a href="{{route('dashboard.home')}}" wire:navigate>
                <div class="parent-icon">
                    <i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard Home</div>
            </a>
        </li>

        <li class="menu-label">Sections</li>
        <li>
            <a href="{{route('dashboard.team')}}" wire:navigate>
                <div class="parent-icon">
                    <i class="bx bxs-user-rectangle"></i>
                </div>
                <div class="menu-title">Team</div>
            </a>
        </li>
        <li>
            <a href="{{route('dashboard.testimonials')}}" wire:navigate>
                <div class="parent-icon">
                    <i class="bx bx-message-alt-detail"></i>
                </div>
                <div class="menu-title">Testimonials</div>
            </a>
        </li>

        <li class="menu-label">Rooms</li>
        <li>
            <a href="{{route('dashboard.room-types')}}" wire:navigate>
                <div class="parent-icon">
                    <i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Room-Types Manage</div>
            </a>
        </li>
        <li>
            <a href="{{route('dashboard.rooms')}}" wire:navigate>
                <div class="parent-icon">
                    <i class="bx bx-hotel"></i>
                </div>
                <div class="menu-title">Rooms Manage</div>
            </a>
        </li>

        <li>
            <a href="{{route('dashboard.bookings')}}" wire:navigate>
                <div class="parent-icon">
                    <i class="bx bx-calendar"></i>
                </div>
                <div class="menu-title">Bookings Manage</div>
            </a>
        </li>

        <li class="menu-label">Blog</li>
        <li>
            <a href="{{route('dashboard.blog-categories')}}" wire:navigate>
                <div class="parent-icon">
                    <i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
        </li>
        <li>
            <a href="{{route('dashboard.blog-posts')}}" wire:navigate>
                <div class="parent-icon">
                    <i class="bx bxl-blogger"></i>
                </div>
                <div class="menu-title">Posts</div>
            </a>
        </li>
        <li>
            <a href="{{route('dashboard.blog-comments')}}" wire:navigate>
                <div class="parent-icon">
                    <i class="bx bx-comment"></i>
                </div>
                <div class="menu-title">Comments</div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
