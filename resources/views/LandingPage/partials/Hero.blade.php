<section class="slider-area " style="background-image: url('{{ asset('LandingPage/assets/img/hero/h1_hero.png') }}');">
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-12">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay="0.2s">Writing Platform</h1>
                            <p data-animation="fadeInLeft" data-delay="0.4s">Build Skills by Writing Articles & Stories.Join Now</p>
                            @if(Auth::user())
                            <a href="{{ route('login') }}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Dashboard</a>
                            @else
                            <a href="{{ route('JoinUs') }}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join Now</a>
                            @endif
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
