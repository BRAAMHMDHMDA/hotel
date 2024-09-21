<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                <input class="form-control px-5" disabled type="search" placeholder="Search">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i class='bx bx-search'></i></span>
            </div>

            <div class="user-box dropdown ms-auto px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('dash_assets/images/avatars/avatar-1.png') }}" class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
{{--                        <p class="designattion mb-0">Web Designer</p>--}}
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2" href="javascript:;">
                            <i class="bx bx-user fs-5"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2" href="javascript:;">
                            <i class="bx bx-cog fs-5"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-2"></div>
                    </li>
                    <li>
                        <livewire:dashboard.auth.logout-form />
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
