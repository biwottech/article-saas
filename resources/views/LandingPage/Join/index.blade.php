@extends('layouts.LandingPageLayout')
@section('content')
<!--begin::Navigation-->
@include('LandingPage.partials.Navigation')
<!--end::Navigation-->
<!--begin::Main Content-->
<main>
    <!--begin::Hero Section-->
    @include('LandingPage.partials.JoinUs')
    <!--end::Hero Section-->
</main>
<!--end::Main Content-->
<!--begin::Footer-->
@include('LandingPage.partials.Footer')
<!--end::Footer-->
@endsection
