@extends('layouts.Master')
@section('header-scripts')
@if(Competetion::IsStarted($competetion->id))
<!-- This Page CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/dist/css/jquery.countdown.css')}}">
@endif
@endsection
@section('content')
<!--begin::Preloader-->
@include('Admin.Dashboard.partials.Preloader')
<!--end::Preloader-->
<!--begin::Page Wrapper-->
<div id="main-wrapper">
    <!--begin::Topbar header-->
    @include('Admin.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('Admin.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Topbar header-->
    @include('Admin.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('Admin.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Page Wrapper-->
    <div class="page-wrapper">
        <!--begin::BreadCrumb-->
        @include('Admin.Dashboard.partials.BreadCrumb')
        <!--end::BreadCrumb-->
        <!--begin::Content-->
        <div class="container-fluid">
            <!--begin::Page Content-->
            <div class="row">
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-12">
                    <!--begin::Competetion Status-->
                    @include('Admin.Dashboard.Competetions.partials.index')
                    <!--end::Competetion Status-->
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Age Groups-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminCompetetionAgeGroups',$competetion->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Age Groups</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-calendar-alt"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ Competetion::CountTotalAgeGroups($competetion->id) }}
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
                <!--end::Age Groups-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Participants-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminCompetetionParticipants',$competetion->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Participants</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-user-graduate"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ Competetion::CountTotalParticipants($competetion->id) }}
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
                <!--end::Participants-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Rated Articles-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminCompetetionRatedArticles',$competetion->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Rated Articles</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-star-half-alt"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ Competetion::CountTotalRatedArticles($competetion->id) }}
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
                <!--end::Rated Articles-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Submitted Articles-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminCompetetionSubmittedArticles',$competetion->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Submitted Articles</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-check"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ Competetion::CountTotalSubmittedArticles($competetion->id) }}
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
                <!--end::Submitted Articles-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Viewed Articles-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminCompetetionViewedArticles',$competetion->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Viewed Articles</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-eye"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ Competetion::CountTotalReadArticles($competetion->id) }}
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
                <!--end::Viewed Articles-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
            </div>
            <!--end::Page Content-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        @include('Admin.Dashboard.partials.Footer')
        <!--end::Footer-->
    </div>
    <!--end::Page Wrapper-->
</div>
<!--end::Wrapper-->
@endsection
