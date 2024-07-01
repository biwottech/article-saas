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
                <div class="col-12">
                    <!--begin::Competetions Information-->
                    @include('Admin.Dashboard.Competetions.partials.CompetetionsInfo')
                    <!--end::Competetions Information-->
                </div>
                <!--begin::Payments-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminPayments') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Payments</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-chart-line"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ Subscription::Payments() }} USD
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
                <!--end::Payments-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Competetions-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminCompetetionsDashboard') }}">
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
                                            <h3><i class="fa-3x fa fa-stopwatch"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ Competetion::CountAll() }}
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
                <!--end::Competetions-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Plans & Pricing-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminPlansPricing') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Plans & Pricing</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-file-invoice-dollar"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ Plan::CountAll() }}
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
                <!--end::Plans & Pricing-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Teachers-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminTeachers') }}">
                        <div class="alert alert-primary text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Teachers</h3>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fa-3x fa fa-chalkboard-teacher"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ Teacher::CountAll() }}
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
                <!--end::Teachers-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Students-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminStudents') }}">
                        <div class="alert alert-primary text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <h3>Students</h3>
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
                                                    {{ Student::CountAll() }}
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
                <!--end::Students-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Age Groups-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminStudentAgeGroups') }}">
                        <div class="alert alert-primary text-center">
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
                                            <h3><i class="fa-3x fa fa-newspaper"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    {{ AgeGroup::CountAll() }}
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
                <!--begin::Articles-->
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <a href="{{ route('AdminArticles') }}">
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
                                                <strong>
                                                    {{ Article::CountAll() }}
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
                <!--end::Articles-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Settings-->
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <a href="{{ route('AdminSettings') }}">
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
                                            <h3><i class="fa-3x fa fa-cog"></i>
                                            </h3>
                                            <h4 class="card-title">
                                                <strong>
                                                    5
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
                <!--end::Settings-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--end::Page Content-->
            </div>
            <!--end::Content-->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!--begin::Footer-->
            @include('Admin.Dashboard.partials.Footer')
            <!--end::Footer-->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!--end::Page Wrapper-->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
    <!--end::Wrapper-->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    @endsection
