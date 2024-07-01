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
                                <h1 data-animation="bounceIn" data-delay="0.2s">About us</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('about') }}">about</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--begin::Services Area 2-->
    @include('LandingPage.partials.ServiceArea2')
    <!--end::Services Area 2-->
    <section class="about-area1 fix pt-10">
        <div class="support-wrapper align-items-center">
            <div class="left-content1">
                <div class="about-icon">
                    <img src="{{ asset('LandingPage/assets/img/icon/about.svg') }}" alt="">
                </div>
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h2 class="">Learn new skills online with top educators</h2>
                        <p>The automated process all your website tasks. Discover tools and
                            techniques to engage effectively with vulnerable children and young
                            people.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('LandingPage/assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Techniques to engage effectively with vulnerable children and young people.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('LandingPage/assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world learning together.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('LandingPage/assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world learning together. Online learning is as easy and natural.</p>
                    </div>
                </div>
            </div>
            <div class="right-content1">
                <div class="right-img">
                    <img src="{{ asset('LandingPage/assets/img/gallery/about.png') }}" alt="">
                    <div class="video-icon">
                        <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="topic-area section-padding40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Explore top subjects</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="{{ asset('LandingPage/assets/img/gallery/topic1.png') }}" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">Programing</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="{{ asset('LandingPage/assets/img/gallery/topic2.png') }}" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">Programing</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="{{ asset('LandingPage/assets/img/gallery/topic3.png') }}" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">Programing</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="{{ asset('LandingPage/assets/img/gallery/topic4.png') }}" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">Programing</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="{{ asset('LandingPage/assets/img/gallery/topic5.png') }}" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">Programing</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="{{ asset('LandingPage/assets/img/gallery/topic6.png') }}" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">Programing</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="{{ asset('LandingPage/assets/img/gallery/topic7.png') }}" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">Programing</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="{{ asset('LandingPage/assets/img/gallery/topic8.png') }}" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">Programing</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mt-20">
                        <a href="#" class="border-btn">View More Stories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="team-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Community experts</h2>
                    </div>
                </div>
            </div>
            <div class="team-active">
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="{{ asset('LandingPage/assets/img/gallery/team1.png')}}" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="#">Mr. Urela</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="{{ asset('LandingPage/assets/img/gallery/team2.png')}}" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="#">Mr. Uttom</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="{{ asset('LandingPage/assets/img/gallery/team3.png')}}" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="#">Mr. Shakil</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="{{ asset('LandingPage/assets/img/gallery/team4.png')}}" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="#">Mr. Arafat</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="{{ asset('LandingPage/assets/img/gallery/team3.png')}}" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="#">Mr. saiful</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--begin::Footer-->
@include('LandingPage.partials.Footer')
<!--end::Footer-->
@endsection
