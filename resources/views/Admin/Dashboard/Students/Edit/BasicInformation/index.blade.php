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
                                <h3 class="text-info"><i class="fa fa-user-cog"></i> {{ $student->name }} Basic Information</h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Here you can Update Student Basic Information.</strong>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                            <div class="card-footer bg-transparent">
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Settings Button-->
                                <a href="{{ route('AdminViewStudent',$student->id) }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Student</a>
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
                    <form method="POST" action="{{ route('AdminUpdateStudentBasicInformation',$student->id) }}">
                        @csrf
                        <div class="col mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $student->name }}" id="name" name="name" placeholder="Your Name Here" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $student->email }}" id="email" name="email" placeholder="Your Email Here" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $student->phone }}" id="phone" name="phone" placeholder="Your Phone Here" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $student->address }}" id="address" name="address" placeholder="Your Address Here" required>
                            @error('address')
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
            @include('Admin.Dashboard.partials.Footer')
            <!--end::Footer-->
        </div>
        <!--end::Page Wrapper-->
    </div>
    <!--end::Wrapper-->
    <div class="chat-windows"></div>
    @endsection
