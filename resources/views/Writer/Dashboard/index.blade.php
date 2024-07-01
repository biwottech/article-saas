@extends('layouts.Master')
@section('content')
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
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            <!--begin::Subscription Status-->
            @include('Writer.Dashboard.partials.NoActiveSubscription')
            <!--end::Subscription Status-->
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            <!--begin::Competetion Status-->
            @include('Writer.Dashboard.Competetions.partials.CompetetionsInfo')
            <!--end::Competetion Status-->
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            <div class="row">
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Articles-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('WriterArticles') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Articles</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-newspaper"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>{{ Student::CountArticles(Auth::user()->id) }}</strong>
                                            </h4>
                                        </div>
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Articles-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Subscriptions-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('WriterSubscriptions') }}">
                        <div class="alert alert-primary text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Subscriptions</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-3x fa-box-open"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>{{ Writer::CountSubscriptions(Auth::user()->id) }}
                                                </strong>
                                            </h4>
                                        </div>
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Subscriptions-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Prices & Plans-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('WriterPlansPricing') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Prices & Plans</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-money-check-alt"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>0</strong>
                                            </h4>
                                        </div>
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Prices & Plans-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Paypal Accounts-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('PaypalAccounts') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Paypal Accounts</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fab fa-3x fa-paypal"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>{{ Auth::user()->PayPalAccounts->count()}}</strong>
                                            </h4>
                                        </div>
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Paypal Accounts-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Competetions-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('WriterCompetetions') }}">
                        <div class="alert alert-primary text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Competetions</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-3x fa-flag-checkered"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>{{ Competetion::CountInitializing() }}</strong>
                                            </h4>
                                        </div>
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Competetions-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Settings-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('WriterSettings') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Settings</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-3x fa-cog"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>6</strong>
                                            </h4>
                                        </div>
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Settings-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
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
