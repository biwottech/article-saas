<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @if($website = Settings::Website())
    <title>{{ $website->text_logo}}</title>
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('Dashboard/assets/images/favicon.png')}}">
    <script src="{{ asset('Dashboard/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!-- Custom CSS -->
    <link href="{{ asset('Dashboard/dist/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('Dashboard/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">
    @yield('header-scripts')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!--begin::Content-->
    @yield('content')
    <!--end::Content-->
    <!--begin::Alerts-->
    @include('errors.error')
    <!--end::Alerts-->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('Dashboard/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('Dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{ asset('Dashboard/dist/js/app.min.js')}}"></script>
    <script src="{{ asset('Dashboard/dist/js/app.init.js')}}"></script>
    <script src="{{ asset('Dashboard/dist/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('Dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('Dashboard/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('Dashboard/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('Dashboard/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('Dashboard/dist/js/custom.min.js')}}"></script>
    <script src="{{ asset('Dashboard/assets/libs/toastr/build/toastr.min.js')}}"></script>
    <script src="{{ asset('Dashboard/assets/extra-libs/toastr/toastr-init.js')}}"></script>
    @yield('footer-scripts')
</body>

</html>
