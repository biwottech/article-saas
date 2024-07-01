@extends('layouts.LandingPageLayout')
@section('content')
<!--begin::Navigation-->
@include('LandingPage.partials.Navigation')
<!--end::Navigation-->
<!--begin::Main Content-->
<main>
    <!--begin::Hero Section-->
    @include('LandingPage.partials.Hero')
    <!--end::Hero Section-->
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
                        <img src="{{ asset('LandingPage/assets/img/icon/right-icon.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Techniques to engage effectively with vulnerable children and young people.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('LandingPage/assets/img/icon/right-icon.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world learning together.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('LandingPage/assets/img/icon/right-icon.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world learning together. Online learning is as easy and natural.</p>
                    </div>
                </div>
            </div>
            <div class="right-content1">
                <div class="right-img">
                    <img src="{{asset('LandingPage/assets/img/gallery/about.png')}}" alt="">
                    <div class="video-icon">
                        <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--begin::Top Stories-->
    <!--end::Top Stories-->
    <section class="about-area3 fix">
        <div class="support-wrapper align-items-center">
            <div class="right-content3">
                <div class="right-img">
                    <img src="{{asset('LandingPage/assets/img/gallery/about3.png')}}" alt="">
                </div>
            </div>
            <div class="left-content3">
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="">Learner outcomes on courses you will take</h2>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{asset('LandingPage/assets/img/icon/right-icon.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Techniques to engage effectively with vulnerable children and young people.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('LandingPage/assets/img/icon/right-icon.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world
                            learning together.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ asset('LandingPage/assets/img/icon/right-icon.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world learning together.
                            Online learning is as easy and natural.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--begin::Team-->
    <!--end::Team-->
    <section class="about-area2 fix pb-padding">
        <div class="support-wrapper align-items-center">
            <div class="right-content2">
                <div class="right-img">
                    <img src="{{ asset('LandingPage/assets/img/gallery/about2.png') }}" alt="">
                </div>
            </div>
            <div class="left-content2">
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="">Take the next step
                            toward your personal
                            and professional goals
                            with us.</h2>
                        <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
                        <a href="#" class="btn">Join now for Free</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--end::Main Content-->
<!--begin::Footer-->
@include('LandingPage.partials.Footer')
<!--end::Footer-->
@endsection
