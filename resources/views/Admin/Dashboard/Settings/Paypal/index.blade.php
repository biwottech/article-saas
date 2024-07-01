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
                                <h3 class="text-info"><i class="fab fa-paypal"></i> Paypal Information</h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Here you can Configure your Paypal.Choose Paypal Mode and Enter Credientals.</strong>
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
                    <form method="POST" action="{{ route('AdminSavePaypalSettings') }}">
                        @csrf
                        <div class="col mb-3">
                            <label for="paypal_mode">Paypal Mode</label>
                            <select class="form-control @error('paypal_mode') is-invalid @enderror" name="paypal_mode">
                                <option @if(Paypal::ModeIsSandbox()) ? selected : "" @endif value="sandbox">Sandbox</option>
                                <option @if(Paypal::ModeIsLive()) ? selected : "" @endif value="live">Live</option>
                            </select>
                            @error('paypal_mode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="client_id">Client ID</label>
                            <input type="client_id" class="form-control @error('client_id') is-invalid @enderror" value="{{ $client_id }}" id="client_id" name="client_id" placeholder="Enter Client ID" required>
                            @error('client_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="secret_id">Secret ID</label>
                            <input type="secret_id" class="form-control @error('secret_id') is-invalid @enderror" value="{{ $secret_id }}" id="secret_id" name="secret_id" placeholder="Enter Secret ID" required>
                            @error('secret_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="account_id">Account_id Email</label>
                            <input type="account_id" class="form-control @error('account_id') is-invalid @enderror" value="{{ $account_id }}" id="account_id" name="account_id" placeholder="Enter Account_id Email" required>
                            @error('account_id')
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
