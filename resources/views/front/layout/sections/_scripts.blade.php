
<!-- Jquery Min JS -->
<script src="{{ asset('front_assets/js/jquery.min.js') }}" data-navigate-once></script>
<!-- Bootstrap Bundle Min JS -->
<script src="{{ asset('front_assets/js/bootstrap.bundle.min.js') }}" data-navigate-once></script>
<!-- Magnific Popup Min JS -->
<script src="{{ asset('front_assets/js/jquery.magnific-popup.min.js') }}" data-navigate-once></script>
<!-- Owl Carousel Min JS -->
<script src="{{ asset('front_assets/js/owl.carousel.min.js') }}" data-navigate-once></script>
<!-- Nice Select Min JS -->
<script src="{{ asset('front_assets/js/jquery.nice-select.min.js') }}" data-navigate-once></script>
<!-- Wow Min JS -->
<script src="{{ asset('front_assets/js/wow.min.js') }}" data-navigate-once></script>
<!-- Jquery Ui JS -->
<script src="{{ asset('front_assets/js/jquery-ui.js') }}" data-navigate-once></script>
<!-- Meanmenu JS -->
<script src="{{ asset('front_assets/js/meanmenu.js') }}" data-navigate-once></script>
<!-- Ajaxchimp Min JS -->
<script src="{{ asset('front_assets/js/jquery.ajaxchimp.min.js') }}" data-navigate-once></script>
<!-- Form Validator Min JS -->
<script src="{{ asset('front_assets/js/form-validator.min.js') }}" data-navigate-once></script>
<!-- Contact Form JS -->
<script src="{{ asset('front_assets/js/contact-form-script.js') }}" data-navigate-once></script>
<!-- Custom JS -->
<script src="{{ asset('front_assets/js/custom.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // Toastr event success
    $(document).on('notify_success', function(e) {
        toastr.success(e.detail[0]);
    });

    @if(Session::has('success'))
    toastr.success(" {{ Session::get('success') }} ");
    @endif
    @if(Session::has('warning'))
    toastr.warning(" {{ Session::get('warning') }} ");
    @endif
    @if(Session::has('info'))
    toastr.info(" {{ Session::get('info') }} ");
    @endif
    @if(Session::has('error'))
    toastr.error(" {{ Session::get('error') }} ");
    @endif
</script>
@livewireScripts

@stack('scripts')

