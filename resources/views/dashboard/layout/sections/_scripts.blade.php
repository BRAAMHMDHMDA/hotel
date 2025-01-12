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
<script src="https://cdn.jsdelivr.net/npm/flatpickr" data-navigate-once></script>
<script src="{{ asset('dash_assets/ckeditor/ckeditor.js') }}" data-navigate-once></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script> const userID = "{{ \Illuminate\Support\Facades\Auth::id() }}"; </script>
<!--app JS-->
<script src="{{ asset('dash_assets/js/app.js') }}"></script>
<script src="{{ asset('dash_assets/js/custom.js') }}" data-navigate-once></script>
@vite('resources/js/app.js')

@stack('scripts')
