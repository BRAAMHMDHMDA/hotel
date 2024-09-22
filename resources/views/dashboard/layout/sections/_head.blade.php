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
    <!-- loader-->
    <link href="{{ asset('dash_assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('dash_assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('dash_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dash_assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('dash_assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('dash_assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('dash_assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('dash_assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('dash_assets/css/header-colors.css') }}" />
    <title>{{config('app.name')}} Dashboard - {{$title ?? ''}}</title>
    @stack('styles')

</head>
