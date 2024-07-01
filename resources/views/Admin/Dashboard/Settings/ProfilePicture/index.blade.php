@extends('layouts.Master')
@section('header-scripts')
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/dist/css/ImageUpload.css') }}">
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
                    <!-- Alert with content -->
                    <div class="alert alert-info mb-5">
                        <div class="card bg-transparent mb-0">
                            <div class="card-body">
                                <h3 class="text-info"><i class="fa fa-portrait"></i> Profile Picture</h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Upload Or Remove Profile Picture</strong>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                            <div class="card-footer bg-transparent">
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Settings Button-->
                                <a href="{{ route('AdminSettings') }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Settings</a>
                                <!--end::Settings Button-->
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
                <div class="col-12">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="imgUp">
                                    @if(!is_null(Auth::user()->user_image))
                                    <div class="imagePreview" style="background-image: url({{ asset('Users/profile_pictures/'.Auth::user()->user_image)}});"></div>
                                    @else
                                    <div class="imagePreview"></div>
                                    @endif
                                    <label class="btn btn-info custom">
                                        Select<input id="uploadFile" type="file" class="uploadFile img @error('profile_picture') is-invalid @enderror" value="Upload Photo" name="profile_picture" style="width: 0px;height: 0px;overflow: hidden;">
                                        @error('profile_picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="text-center mb-3">
                                    <button formaction="{{ route('AdminSaveProfilePicture') }}" type="submit" class="btn btn-info btn-rounded">Save Image</button>
                                    @if(!is_null(Auth::user()->user_image))
                                    <button formaction="{{ route('AdminRemoveProfilePicture') }}" type="submit" class="btn btn-danger btn-rounded">Remove Image</button>
                                    @endif
                                </div>
                                <div class="mt-3 text-center">
                                    <strong class="text-muted">
                                        If you want to Use any Picture then First Select a Picture and then Upload.
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </form>
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
    @section('footer-scripts')
    <script type="text/javascript" src="{{ asset('Dashboard/dist/js/ImageUpload.js') }}"></script>
    @endsection
