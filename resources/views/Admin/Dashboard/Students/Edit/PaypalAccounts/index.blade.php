@extends('layouts.Master')
@section('header-scripts')
<!-- This page plugin CSS -->
<link href="{{ asset('Dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
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
                                <h3 class="text-info"><i class="fab fa-paypal"></i> Paypal Accounts</h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Here yo can View , Update & Delete {!! $student->name !!} Paypal Accounts.</strong>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                            <div class="card-footer bg-transparent">
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Settings Button-->
                                <a href="{{ route('AdminViewStudent',$student->id) }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go Back to Student</a>
                                <!--end::Settings Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Settings Button-->
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary" data-toggle="modal" data-target="#AddPaypalAccount"> <i class="fas fa-plus "></i> Add Paypal Account</button>
                                <!--end::Settings Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create Paypal Account Modal-->
                                @include('Admin.Dashboard.Students.Edit.PaypalAccounts.partials.AddPaypalModal')
                                <!--begin::Create Paypal Account Modal-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($accounts)
                                @foreach($accounts as $paypal)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $paypal->account_name }}</td>
                                    <td>{{ $paypal->email }}</td>
                                    <td>
                                        <button type="button" class="btn-sm btn waves-effect waves-light btn-rounded btn-info" data-toggle="modal" data-target="#UpdatePaypal{{$paypal->id}}Account">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <!--begin::Update Account Modal-->
                                    @include('Admin.Dashboard.Students.Edit.PaypalAccounts.partials.UpdatePaypalModal')
                                    <!--begin::Update Account Modal-->
                                    <td>
                                        <form method="post" action="{{ route('AdminDeleteStudentPaypalAccount',$paypal->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
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
    @endsection
    @section('footer-scripts')
    <!--This page plugins -->
    <script src="{{ asset('Dashboard/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('Dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    @endsection
