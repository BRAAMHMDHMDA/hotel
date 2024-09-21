<!doctype html>
<html lang="en" class="semi-dark">

    <!-- Start Head Tag -->
    @include('dashboard.layout.sections._head')
    <!-- End Head Tag -->

    <body>
        <!--wrapper-->
        <div class="wrapper">
            {{$slot}}
        </div>
        <!--end wrapper-->


        <!--start Scripts-->
        @include('dashboard.layout.sections._scripts')
        <script>
            $(document).ready(function () {
                $("#show_hide_password a").on('click', function (event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("bx-hide");
                        $('#show_hide_password i').removeClass("bx-show");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("bx-hide");
                        $('#show_hide_password i').addClass("bx-show");
                    }
                });
            });
        </script>
        <!--end Scripts-->

    </body>

</html>
