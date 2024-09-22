<!doctype html>
<html lang="en">

    @include('front.layout.sections._head')

    <body class="antialiased">

        <!-- PreLoader Start -->
{{--        @include('front.layout.sections._preloader')--}}
        <!-- PreLoader End -->

        <!-- Top Header Start -->
        @include('front.layout.sections._header')
        <!-- Top Header End -->

        <!-- Start Navbar Area -->
        @include('front.layout.sections._navbar')
        <!-- End Navbar Area -->
        <main>
            {{$slot}}
        </main>
        <!-- Footer Area -->
        @include('front.layout.sections._footer')
        <!-- Footer Area End -->

        @include('front.layout.sections._scripts')

    </body>

</html>
