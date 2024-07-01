@extends('layouts.Master')
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
                    <!-- Alert with content -->
                    <!-- Alert with content -->
                    <div class="alert alert-info text-center">
                        <div class="card bg-transparent">
                            <div class="card-header bg-transparent">
                                <h3>Plan Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="fas fa-4x fa-file-invoice-dollar"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            <strong>
                                                Name {{ $plan->name }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="fa-4x fa fa-dollar-sign"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            <strong>
                                                Price {{ $plan->price }} USD
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="fa-4x fa fa-user-plus"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            SignUp Fee <strong>
                                                {{ $plan->signup_fee }} USD
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="fa-4x fa fa-globe"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Countries Added <strong>
                                                {{ Plan::CountAddedCountries($plan->id) }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                                <p class="card-text">
                                    <strong>
                                    </strong>
                                </p>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Dashboard Button-->
                                <a href="{{ route('AdminDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create New Plan Button-->
                                <a href="{{ route('AdminCreatePlan') }}" class="btn waves-effect waves-light btn-rounded btn-primary"> <i class="fas fa-plus "></i> Create New Plan</a>
                                <!--end::Create New Plan Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Plans & Pricing Button-->
                                <a href="{{ route('AdminPlansPricing') }}" class="btn waves-effect waves-light btn-rounded btn-primary"> <i class="fas fa-long-arrow-alt-left"></i> Go to Plans & Pricing</a>
                                <!--end::Plans & Pricing Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Plan Features Button-->
                                <a href="{{ route('AdminEditFeatures',$plan->id) }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Plan Features</a>
                                <!--end::Plan Features Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                        </div>
                    </div>
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--begin::Update Plan Form-->
                    @include('Admin.Dashboard.PlansPricing.Update.partials.UpdatePlanForm')
                    <!--end::Update Plan Form-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
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
