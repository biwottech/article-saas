@extends('layouts.LandingPageLayout')
@section('content')
<!--begin::Navigation-->
@include('LandingPage.partials.Navigation')
<!--end::Navigation-->
<main>
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Top Winners</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('Winners') }}">Winners</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--begin::Winners-->
    @include('LandingPage.partials.winners')
    <!--end::Winners-->
</main>
<!--begin::Footer-->
@include('LandingPage.partials.Footer')
<!--end::Footer-->
@endsection
