@extends('layouts.Master')
@section('content')
<style type="text/css">
html {
    font-size: 14px;
}

@media(min-width: 768px) {
    html {
        font-size: 16px;
    }
}

.container {
    max-width: 960px;
}

.pricing-header {
    max-width: 700px;
}

.card-deck .card {
    min-width: 220px;
}

.border-top {
    border-top: 1px solid #e5e5e5;
}

.border-bottom {
    border-bottom: 1px solid #e5e5e5;
}

.box-shadow {
    box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
}

</style>
<!--begin::Preloader-->
@include('Writer.Dashboard.partials.Preloader')
<!--end::Preloader-->
<!--begin::Page Wrapper-->
<div id="main-wrapper">
    <!--begin::Topbar header-->
    @include('Writer.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('Writer.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Topbar header-->
    @include('Writer.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('Writer.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Page Wrapper-->
    <div class="page-wrapper">
        <!--begin::BreadCrumb-->
        @include('Writer.Dashboard.partials.BreadCrumb')
        <!--end::BreadCrumb-->
        <!--begin::Content-->
        <div class="container-fluid">
            <!--begin::Page Content-->
            <div class="row">
                <div class="col-12">
                    <!--begin::Plan Information-->
                    @include('Writer.Dashboard.PlansPricing.partials.PlanInformation')
                    <!--end::Plan Information-->
                    <!--begin::Plans-->
                    @if(!is_null($plans))
                    <div class="card-deck mb-3">
                        @foreach($plans as $plan)
                        <div class="card mb-4 box-shadow">
                            <div class="card-header text-center  @if(Writer::SubscriptionIsActive(Auth::user()->id,$plan->id)) bg-primary @else bg-info @endif text-white">
                                <h4 class="my-0 font-weight-normal">{{ $plan->name }}</h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h1 class="card-title pricing-card-title">${{$plan->price}} <small class="text-muted">/ @if($plan->grace_period == intval(30)) Month @else {{ $plan->grace_period }} Days @endif</small></h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><strong>Sign Up Fee ${{ $plan->signup_fee}}</strong></li>
                                        <br>
                                        <!--begin::If Plan Trial > 0-->
                                        @if($plan->trial_period > intval(0))
                                        <li><strong>{{ $plan->trial_period}} {{ $plan->trial_interval}} Trial</strong></li>
                                        <br>
                                        @endif
                                        <!--begin::Plan Features-->
                                        @include('Writer.Dashboard.PlansPricing.partials.PlanFeatures')
                                        <!--end::Plan Features-->
                                    </ul>
                                    @if(!Writer::hasAnyActiveSubscription(Auth::user()->id))
                                    <button type="submit" formaction="{{ route('WriterChoosePlan',$plan->price_id) }}" class="btn btn-info btn-lg btn-block">Subscribe Now</button>
                                    @else
                                    @if(Writer::SubscriptionIsActive(Auth::user()->id,$plan->id))
                                    <a href="#" class="btn btn-primary btn-lg btn-block">Subscribed</a>
                                    @else
                                    <a href="#" class="btn btn-info btn-lg btn-block disabled">Subscribe Now</a>
                                    @endif
                                    @endif
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <!--end::Plans-->
                </div>
            </div>
            <!--end::Page Content-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        @include('Writer.Dashboard.partials.Footer')
        <!--end::Footer-->
    </div>
    <!--end::Page Wrapper-->
</div>
<!--end::Wrapper-->
@endsection
