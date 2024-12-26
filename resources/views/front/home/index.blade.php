<div>
    <!-- Banner Area -->
    <div class="banner-area" style="height: 480px;">
        <div class="container">
            <div class="banner-content">
                <h1>Discover a Hotel & Resort to Book a Suitable Room</h1>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Banner Form Area -->
    <livewire:front.home.check-availability-form />
    <!-- Banner Form Area End -->

    <!-- Room Area -->
    @include('front.home.sections._rooms')
    <!-- Room Area End -->

    <!-- Book Area Two-->
    @include('front.home.sections._quick-booking')
    <!-- Book Area Two End -->

    <!-- Team Area Three -->
    <x-front.sections.team />
    <!-- Team Area Three End -->

    <!-- Testimonials Area Three -->
    <x-front.sections.testimonials />
    <!-- Testimonials Area Three End -->

    <!-- FAQ Area -->
    @include('front.home.sections._faq')
    <!-- FAQ Area End -->

    <!-- Blog Area -->
    @include('front.home.sections._blog')
    <!-- Blog Area End -->
</div>
