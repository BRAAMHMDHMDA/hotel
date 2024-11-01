<div class="service-side-bar">
    <div class="services-bar-widget">
        <h3 class="title">Others Services</h3>
        <div class="side-bar-categories">
            <img src="{{Auth::user()?->image_url}}" class="rounded mx-auto d-block" alt="Image" style="width:100px; height:100px;"> <br><br>

            <ul>

                <li>
                    <a wire:navigate href="{{route('user.dashboard')}}" class="w-100">My Dashboard</a>
                </li>
                <li>
                    <a wire:navigate href="{{route('user.profile')}}" class="w-100">My Profile </a>
                </li>
                <li>
                    <a wire:navigate href="{{route('user.change-password')}}" class="w-100">Change Password</a>
                </li>
                <li>
                    <a wire:navigate href="{{route('user.bookings')}}" class="w-100">My Bookings</a>
                </li>
                <li>
                    <a href="#" wire:navigate class="w-100" onclick="$('#logout-form').submit()">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
