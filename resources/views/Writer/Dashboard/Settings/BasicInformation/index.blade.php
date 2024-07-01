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
                                <h3 class="text-info"><i class="fa fa-user-cog"></i> Basic Information</h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Please Enter your Basic Information.</strong>
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
                <div class="col-12">
                    <form method="POST" action="{{ route('WriterSaveBasicInformation') }}">
                        @csrf
                        <div class="d-flex mt-2 mb-2">
                            <div class="col px-0">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" id="name" name="name" placeholder="Your Name Here" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col py-0">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" id="email" name="email" placeholder="Your Email Here" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex mt-2 mb-2">
                            <div class="col px-0">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ Auth::user()->phone }}" id="phone" name="phone" placeholder="Your Phone Here" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col py-0">
                                <label for="date_of_birth">Date Of Birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ Auth::user()->date_of_birth }}" id="date_of_birth" name="date_of_birth" placeholder="Your Date Of Birth Here" required>
                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex mt-2 mb-2">
                            <div class="col px-0">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->address }}" id="address" name="address" placeholder="Your Address Here" required>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col py-0">
                                <label for="place_of_birth">Place Of Birth</label>
                                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ Auth::user()->place_of_birth }}" id="place_of_birth" name="place_of_birth" placeholder="Your Place Of Birth" required>
                                @error('place_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex mt-2 mb-2">
                            <div class="col px-0">
                                <label for="father_name">Father Name</label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror" value="{{ Auth::user()->father_name }}" id="father_name" name="father_name" placeholder="Your Father Name Here" required>
                                @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col py-0">
                                <label for="mother_name">Mother Name</label>
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror" value="{{ Auth::user()->mother_name }}" id="mother_name" name="mother_name" placeholder="Your Mother Name Here" required>
                                @error('mother_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
