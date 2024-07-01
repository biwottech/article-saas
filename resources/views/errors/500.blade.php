@extends('layouts.AuthLayout')
@section('content')
<!--begin::Preloader-->
<!--end::Preloader-->
<!-- 404 box.scss -->
<!-- ============================================================== -->
<div class="error-box" style="background: url({{ asset('Dashboard/assets/images/background/error-bg.jpg') }});">
    <div class="error-body text-center">
        <h1 class="error-title text-info">500</h1>
        <h3 class="text-uppercase error-subtitle">INTERNAL SERVER ERROR !</h3>
        <p class="text-muted mt-4 mb-4">PLEASE TRY AFTER SOME TIME</p>
        <a href="{{ route('login') }}" class="btn btn-danger btn-rounded waves-effect waves-light mb-5">Dashboard</a>
    </div>
</div>
<!-- ============================================================== -->
<!-- 404 box.scss -->
<!-- All Required js -->
<!-- ============================================================== -->
@section('footer-scripts')
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
});

</script>
@endsection
@endsection
