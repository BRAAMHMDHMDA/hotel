<script type="text/javascript">

    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif

{{--    @if (session('success'))--}}
{{--    toastr.success("{!! session('success') !!}", "Success");--}}
{{--    @elseif(session('warning'))--}}
{{--    toastr.warning("{!! session('warning') !!}", "Warning");--}}
{{--    @elseif(session('error'))--}}
{{--    toastr.error("{!! session('error') !!}", "Error");--}}
{{--    @elseif(session('info'))--}}
{{--    toastr.info("{!! session('info') !!}", "Info");--}}
{{--    @endif--}}

</script>
