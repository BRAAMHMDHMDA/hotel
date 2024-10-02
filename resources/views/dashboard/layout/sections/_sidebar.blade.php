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
                <div class="menu-title">Team Management</div>
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

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
