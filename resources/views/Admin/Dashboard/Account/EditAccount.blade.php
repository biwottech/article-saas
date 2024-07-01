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
                <div class="col-12">
                    <div class="card">
                        <form class="form-horizontal r-separator" method="post" action="{{ route('AdminUpdateAccount') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title mt-2 pb-3">Basic Information</h4>
                                <div class="form-group row pb-3">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" id="name" name="name" placeholder="Your Name Here" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row pb-3">
                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" id="email" name="email" placeholder="Your Email Here" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row pb-3">
                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Profile Picture</label>
                                    <div class="col-sm-3 col-lg-3 col-md-3">
                                        <div class="imgUp">
                                            @if(!is_null(Auth::user()->user_image))
                                            <div class="imagePreview" style="background-image: url({{ asset('Users/profile_pictures/'.Auth::user()->user_image)}});"></div>
                                            @else
                                            <div class="imagePreview"></div>
                                            @endif
                                            <i class="fas fa-trash-alt del text-danger" style="background: transparent;"></i>
                                            <label class="btn btn-info custom">
                                                Upload<input id="uploadFile" type="file" class="uploadFile img @error('profile_picture') is-invalid @enderror" value="Upload Photo" name="profile_picture" style="width: 0px;height: 0px;overflow: hidden;">
                                                @error('profile_picture')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title mt-2 pb-3">Security</h4>
                                <div class="form-group row pb-3">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Your Password Here">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row pb-3">
                                    <label for="password_confirmation" class="col-sm-3 text-right control-label col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Your Password">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-0 text-right">
                                    <button type="submit" class="btn btn-info waves-effect waves-light btn-rounded">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
<div class="chat-windows"></div>
@section('footer-scripts')
<script type="text/javascript" src="{{ asset('Dashboard/dist/js/ImageUpload.js') }}"></script>
@endsection
@endsection
