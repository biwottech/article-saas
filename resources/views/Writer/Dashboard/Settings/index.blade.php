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
                                <h4 class="mb-3 mt-2">Here you can Update Your Details & Information</h4>
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
                    <a href="{{ route('WriterProfilePicture') }}">
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
                    <a href="{{ route('WriterBasicInformation') }}">
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
                <!--begin::School Information-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('WriterSchoolInformation') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-school fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>School Information</strong>
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
                <!--end::School Information-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Teacher Information-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('WriterTeacherInformation') }}">
                        <div class="alert alert-info text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-chalkboard-teacher fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Teacher Information</strong>
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
                <!--end::Teacher Information-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Institute Information-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('WriterInstituteInformation') }}">
                        <div class="alert alert-primary text-center">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        <div class="col">
                                            <h3><i class="fas fa-university fa-4x"></i>
                                            </h3>
                                            <h4 class="card-title mt-4">
                                                <strong>Institute Information</strong>
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
                <!--end::Institute Information-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Security-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <a href="{{ route('WriterSecurity') }}">
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
        @include('Writer.Dashboard.partials.Footer')
        <!--end::Footer-->
    </div>
    <!--end::Page Wrapper-->
</div>
<!--end::Wrapper-->
@endsection
