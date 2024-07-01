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
                <!--begin::Student Information-->
                @include('Admin.Dashboard.Students.partials.StudentInformation')
                <!--end::Student Information-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Profile Picture-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminViewStudentProfilePicture',$student->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <h3><i class="fas fa-portrait fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Profile Picture</strong>
                                            </h4>
                                            <h4 class="card-title">
                                                <strong>View,Edit & Delete</strong>
                                            </h4>
                                        </div>
                                    </div>
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
                    <a href="{{ route('AdminViewStudentBasicInformation',$student->id) }}">
                        <div class="alert alert-primary text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <h3><i class="fas fa-user-cog fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Basic Information</strong>
                                            </h4>
                                            <h4 class="card-title">
                                                <strong>View,Edit & Delete</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Basic Information-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Competetions-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminViewStudentCompetetions',$student->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <h3><i class="fas fa-stopwatch fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Competetions</strong>
                                            </h4>
                                            <h4 class="card-title">
                                                <strong>View,Edit & Delete</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Competetions-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Subscriptions-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminViewStudentSubscriptions',$student->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <h3><i class="fas fa-portrait fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Subscriptions</strong>
                                            </h4>
                                            <h4 class="card-title">
                                                <strong>View,Edit & Delete</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Subscriptions-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Paid Amount-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminViewStudentPaidAmount',$student->id) }}">
                        <div class="alert alert-primary text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <h3><i class="fas fa-money-bill fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Paid Amount</strong>
                                            </h4>
                                            <h4 class="card-title">
                                                <strong>View,Edit & Delete</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Paid Amount-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Won Amount-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminViewStudentWonAmount',$student->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <h3><i class="fas fa-crown fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Won Amount</strong>
                                            </h4>
                                            <h4 class="card-title">
                                                <strong>View,Edit & Delete</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Won Amount-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Articles-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminViewStudentArticles',$student->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <h3><i class="fas fa-newspaper fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Articles</strong>
                                            </h4>
                                            <h4 class="card-title">
                                                <strong>View,Edit & Delete</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Articles-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Paypal-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminViewStudentPaypalAccounts',$student->id) }}">
                        <div class="alert alert-primary text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <h3><i class="fab fa-paypal fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Paypal Accounts</strong>
                                            </h4>
                                            <h4 class="card-title">
                                                <strong>View,Edit & Delete</strong>
                                            </h4>
                                        </div>
                                    </div>
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
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('AdminEditStudentPassword',$student->id) }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <h3><i class="fas fa-key fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Security</strong>
                                            </h4>
                                            <h4 class="card-title">
                                                <strong>Edit & Update Password</strong>
                                            </h4>
                                        </div>
                                    </div>
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
