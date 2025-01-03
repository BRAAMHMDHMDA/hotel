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

        @canany(['room_type-list', 'room-list', 'booking-list'])
            <li class="menu-label">Rooms</li>
        @endcanany
        @can('room_type-list')
            <li>
                <a href="{{route('dashboard.room-types')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Room-Types Manage</div>
                </a>
            </li>
        @endcan
        @can('room-list')
            <li>
                <a href="{{route('dashboard.rooms')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bx-hotel"></i>
                    </div>
                    <div class="menu-title">Rooms Manage</div>
                </a>
            </li>
        @endcan
        @can('booking-list')
            <li>
                <a href="{{route('dashboard.bookings')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bx-calendar"></i>
                    </div>
                    <div class="menu-title">Bookings Manage</div>
                </a>
            </li>
        @endcan

        @canany(['blog_post-list', 'blog_comment-list','blog_category-list','team-list','testimonial-list', 'gallery-list', 'contact-list'])
        <li class="menu-label">Sections</li>
        @endcanany
        @canany(['blog_post-list', 'blog_comment-list','blog_category-list'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bxl-blogger"></i>
                    </div>
                    <div class="menu-title">Blog</div>
                </a>
                <ul>
                    @can('blog_category-list')
                        <li>
                            <a href="{{route('dashboard.blog-categories')}}" wire:navigate>
                                <div class="parent-icon">
                                    <i class="bx bx-category"></i>
                                </div>
                                <div class="menu-title">Categories</div>
                            </a>
                        </li>
                    @endcan
                    @can('blog_post-list')
                        <li>
                            <a href="{{route('dashboard.blog-posts')}}" wire:navigate>
                                <div class="parent-icon">
                                    <i class="bx bxl-blogger"></i>
                                </div>
                                <div class="menu-title">Posts</div>
                            </a>
                        </li>
                    @endcan
                    @can('blog_comment-list')
                        <li>
                            <a href="{{route('dashboard.blog-comments')}}" wire:navigate>
                                <div class="parent-icon">
                                    <i class="bx bx-comment"></i>
                                </div>
                                <div class="menu-title">Comments</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @canany(['blog_post-list', 'blog_comment-list','blog_category-list'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-layout"></i>
                    </div>
                    <div class="menu-title">Home Page Manage</div>
                </a>
                <ul>
                    @can('blog_category-list')
                        <li>
                            <a href="{{route('dashboard.quickBooking-area')}}" wire:navigate>
                                <div class="parent-icon">
                                    <i class="bx bx-fast-forward-circle"></i>
                                </div>
                                <div class="menu-title">Quick Booking Area</div>
                            </a>
                        </li>
                    @endcan
                    @can('blog_post-list')
                        <li>
                            <a href="{{route('dashboard.frequentQuestions-area')}}" wire:navigate>
                                <div class="parent-icon">
                                    <i class="bx bx-question-mark"></i>
                                </div>
                                <div class="menu-title">Frequent Questions Area</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @can('team-list')
            <li>
                <a href="{{route('dashboard.team')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bxs-user-rectangle"></i>
                    </div>
                    <div class="menu-title">Team</div>
                </a>
            </li>
        @endcan
        @can('testimonial-list')
            <li>
                <a href="{{route('dashboard.testimonials')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bx-message-alt-detail"></i>
                    </div>
                    <div class="menu-title">Testimonials</div>
                </a>
            </li>
        @endcan
        @can('gallery-list')
            <li>
                <a href="{{route('dashboard.gallery')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bx-images"></i>
                    </div>
                    <div class="menu-title">Gallery</div>
                </a>
            </li>
        @endcan
        @can('contact-list')
            <li>
                <a href="{{route('dashboard.contacts')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bxs-message-rounded-dots"></i>
                    </div>
                    <div class="menu-title">Contacts</div>
                </a>
            </li>
        @endcan


        @canany(['setting-list', 'role-list','admin-list'])
        <li class="menu-label">App</li>
        @endcanany
        @can('admin-list')
            <li>
                <a href="{{route('dashboard.admins')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="menu-title">Admins</div>
                </a>
            </li>
        @endcan
        @can('role-list')
            <li>
                <a href="{{route('dashboard.roles')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bx-lock"></i>
                    </div>
                    <div class="menu-title">Roles</div>
                </a>
            </li>
        @endcan
        @can('setting-list')
            <li>
                <a href="{{route('dashboard.settings')}}" wire:navigate>
                    <div class="parent-icon">
                        <i class="bx bx-cog"></i>
                    </div>
                    <div class="menu-title">Settings</div>
                </a>
            </li>
        @endcan


    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
