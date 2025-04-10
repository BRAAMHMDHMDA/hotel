<!doctype html>
<html lang="en" class="semi-dark">

    <!-- Start Head Tag -->
    @livewireStyles
    @include('dashboard.layout.sections._head')
    <!-- End Head Tag -->

    <body class="antialiased">
        <!--wrapper-->
        <div class="wrapper">

            <!--sidebar wrapper -->
            @include('dashboard.layout.sections._sidebar')
            <!--end sidebar wrapper -->

            <!--start header -->
            @include('dashboard.layout.sections._header')
            <!--end header -->

            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    {{$slot}}
                </div>
            </div>
            <!--end page wrapper -->

            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->

            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->

            <footer class="page-footer">
                <p class="mb-0">Copyright © 2021. All right reserved.</p>
            </footer>

        </div>
        <!--end wrapper-->
    </body>

    <!--start Scripts-->
    @include('dashboard.layout.sections._scripts')
    <!--end Scripts-->
</html>
