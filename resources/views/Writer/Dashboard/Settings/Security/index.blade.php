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
                    <div class="alert alert-info mb-5">
                        <div class="card bg-transparent mb-0">
                            <div class="card-body">
                                <h3 class="text-info"><i class="fa fa-key"></i> Password & Security</h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Leave Blank If you don't want to Change The Password.</strong>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                            <div class="card-footer bg-transparent">
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Settings Button-->
                                <a href="{{ route('WriterSettings') }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Settings</a>
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
                <div class="col-sm-12 col-lg-12 col-md-12 ">
                    <form method="POST" action="{{ route('WriterSavePassword') }}">
                        @csrf
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Your Password Here">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Confirm">Confirm</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Your Password">
                        </div>
                        <button type="submit" class="btn btn-info btn-rounded">Save Changes</button>
                    </form>
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
    <div class="chat-windows"></div>
    @endsection
