<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @livewireStyles
    <!--favicon-->
    <link rel="icon" href="{{ asset('dash_assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('dash_assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('dash_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('dash_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dash_assets/plugins/notifications/css/lobibox.min.css') }}" />
    <!-- loader-->
    <link href="{{ asset('dash_assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('dash_assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('dash_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dash_assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('dash_assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('dash_assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('dash_assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('dash_assets/css/semi-dark.css') }}" />
{{--    <link rel="stylesheet" href="{{ asset('dash_assets/css/header-colors.css') }}" />--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



    <title>{{config('app.name')}} Dashboard - {{$title ?? ''}}</title>
    <style>
        .facilities-input {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            padding: 0.5rem;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            cursor: text;
        }
        .facilities-input .facility {
            background-color: #0d6efd;
            color: white;
            padding: 0.3rem 0.5rem;
            border-radius: 0.25rem;
        }
        .facilities-input span i {
            cursor: pointer;
            margin-left: 0.3rem;
        }
        .facilities-input input {
            border: none;
            outline: none;
            flex-grow: 1;
        }
    </style>
    @stack('styles')

</head>
