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
                    <div class="alert alert-info mb-5">
                        <div class="card bg-transparent mb-0">
                            <div class="card-body">
                                <h3 class="text-info"><i class="fa fa-globe"></i> Website Information</h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Please Enter your Website Information.This Information will be displayed as your Contact Information.Leave it blank if you don't want to Display your Information on Contact Page.</strong>
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
                    <form method="POST" action="{{ route('AdminSaveWebsiteInformation') }}">
                        @csrf
                        <div class="col mb-3">
                            <label for="text_logo">Text Logo</label>
                            <input type="text" class="form-control @error('text_logo') is-invalid @enderror" value="{{ $siteinfo->text_logo }}" id="text_logo" name="text_logo" placeholder="Text will be used as Logo" required>
                            <small class="text-muted">
                                This Text will be shown as a logo If no logo will be found
                            </small>
                            @error('text_logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $siteinfo->email }}" id="email" name="email" placeholder="Text will be used as Logo" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $siteinfo->phone }}" id="phone" name="phone" placeholder="Your Phone Here" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $siteinfo->address }}" id="address" name="address" placeholder="Your Address Here" required>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <button type="submit" class="btn btn-info btn-rounded">Save Changes</button>
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
    <div class="chat-windows"></div>
    @endsection
