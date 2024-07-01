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
                                <h3 class="text-info"><i class="fa fa-chalkboard-teacher"></i> Teacher Information</h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Please Enter your Favourite Teacher Information.</strong>
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
                    <form method="POST" action="{{ route('WriterSaveTeacherInformation') }}">
                        @csrf
                        <div class="form-group">
                            <label for="favourite_educator_name">Name</label>
                            <input type="text" class="form-control @error('favourite_educator_name') is-invalid @enderror" value="{{ Auth::user()->favourite_educator_name }}" id="favourite_educator_name" name="favourite_educator_name" placeholder="Your Educator Name" required>
                            @error('favourite_educator_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="favourite_educator_email">Email</label>
                            <input type="email" class="form-control @error('favourite_educator_email') is-invalid @enderror" value="{{ Auth::user()->favourite_educator_email }}" id="favourite_educator_email" name="favourite_educator_email" placeholder="Your Educator Email" required>
                            @error('favourite_educator_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="favourite_educator_phone">Phone</label>
                            <input type="text" class="form-control @error('favourite_educator_phone') is-invalid @enderror" value="{{ Auth::user()->favourite_educator_phone }}" id="favourite_educator_phone" name="favourite_educator_phone" placeholder="Your Educator Phone" required>
                            @error('favourite_educator_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="favourite_educator_address">Address</label>
                            <input type="text" class="form-control @error('favourite_educator_address') is-invalid @enderror" value="{{ Auth::user()->favourite_educator_address }}" id="favourite_educator_address" name="favourite_educator_address" placeholder="Your Institute Address" required>
                            @error('favourite_educator_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
