<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if($website = Settings::Website())
    <title>{{ $website->text_logo}}</title>
    @endif
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('LandingPage/assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/css/style.css')}}">
    @yield('header-scripts')
</head>

<body>
    <!--begin::Preloader-->
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('LandingPage/assets/img/logo/loder.png') }}" alt="Loading">
                </div>
            </div>
        </div>
    </div> --}}
    <!--end::Preloader-->
    @yield('content')
    <!--begin::Back To Top-->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
    <!--end::Back Top Top-->
    <script src="{{ asset('LandingPage/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/slick.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/animated.headline.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/gijgo.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.barfiller.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/hover-direction-snake.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/contact.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.form.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/mail-script.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('LandingPage/assets/js/main.js')}}"></script>
    @yield('footer-scripts')
</body>

</html>
