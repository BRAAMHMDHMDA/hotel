@livewireScripts
<!-- Bootstrap JS -->
<script src="{{ asset('dash_assets/js/bootstrap.bundle.min.js') }}" data-navigate-once></script>
<!--plugins-->
<script src="{{ asset('dash_assets/js/jquery.min.js') }}" data-navigate-once></script>
<script src="{{ asset('dash_assets/plugins/simplebar/js/simplebar.min.js') }}" data-navigate-once></script>
<script src="{{ asset('dash_assets/plugins/metismenu/js/metisMenu.min.js') }}" data-navigate-once></script>
<script src="{{ asset('dash_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}" data-navigate-once></script>
<script src="{{ asset('dash_assets/plugins/notifications/js/notifications.min.js') }}" data-navigate-once></script>
<script src="{{ asset('dash_assets/plugins/notifications/js/lobibox.min.js') }}"  data-navigate-once></script>

<!--app JS-->
<script src="{{ asset('dash_assets/js/app.js') }}"></script>
<script src="{{ asset('dash_assets/js/custom.js') }}" data-navigate-once></script>

@stack('scripts')
