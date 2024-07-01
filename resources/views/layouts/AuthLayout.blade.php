<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- @if(!is_null(Website::Info()))
    <title>{{ Website::Info()->text_logo}}</title>
    @endif --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('Dashboard/assets/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('Dashboard/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashboard/dist/css/custom.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!--begin::Content-->
        @yield('content')
        <!--end::Content-->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('Dashboard/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('Dashboard/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('Dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    @yield('footer-scripts')
</body>

</html>
