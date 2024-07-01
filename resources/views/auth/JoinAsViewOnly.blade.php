@extends('layouts.LandingPageLayout')
@section('content')
<!--begin::Navigation-->
@include('LandingPage.partials.Navigation')
<!--end::Navigation-->
<main class="login-body" style="background-image: url({{ asset('LandingPage/assets/img/hero/login.png') }});">
    <!--begin::Reader Form-->
    @include('auth.partials.ReaderForm')
    <!--begin::Reader Form-->
</main>
<!--begin::Footer-->
@include('LandingPage.partials.Footer')
<!--end::Footer-->
@endsection
