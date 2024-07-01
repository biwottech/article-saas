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
                    <div class="alert alert-info mb-3">
                        <div class="card bg-transparent mb-0">
                            <div class="card-body">
                                <h1 class="text-info"><i class="fa fa-cogs"></i> Settings</h1>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <h4 class="mb-3 mt-2">Here you can Change Settings & You can Update Details & Information.</h4>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <a href="{{ route('AdminDashboard') }}" class="btn btn-info btn-rounded"><i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Profile Picture-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminProfilePicture') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-portrait fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Profile Picture</strong>
                                            </h4>
                                        </div>
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </div>
                                    <!--end::Go Back To Dashboard Button-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Profile Picture-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Basic Information-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminBasicInformation') }}">
                        <div class="alert alert-primary text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-user-cog fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Basic Information</strong>
                                            </h4>
                                        </div>
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </div>
                                    <!--end::Go Back To Dashboard Button-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Basic Information-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Website-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminWebsiteInformation') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-globe fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Website Information</strong>
                                            </h4>
                                        </div>
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </div>
                                    <!--end::Go Back To Dashboard Button-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Website-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Paypal-->
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <a href="{{ route('AdminPaypalSettings') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fab fa-paypal fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Paypal</strong>
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
                <!--end::Paypal-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Security-->
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <a href="{{ route('AdminSecurity') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-key fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Security</strong>
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
                <!--end::Security-->
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
