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
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            <div class="row">
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-12">
                    <!--begin::Paypal Accounts Information-->
                    <!-- Alert with content -->
                    <div class="alert alert-info">
                        <div class="card bg-transparent mb-0">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="col p-0">
                                        <h3 class="text-info"><i class="fab fa-paypal"></i> Paypal Accounts</h3>
                                    </div>
                                    <div class="col text-right p-0">
                                        <button type="button" data-toggle="modal" data-target="#AddPaypalAccountModal" class="btn btn-info btn-rounded">Add PayPal Account</button>
                                    </div>
                                </div>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Add Paypal Account-->
                                @include('Writer.Dashboard.PaypalAccounts.partials.AddPaypalAccountModal')
                                <!--end::Add Paypal Account-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong>Here you can View , Add , Update & Delete your Paypal Accounts.These accounts will be used to recieve money if you won any Competetion.</strong>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!--end::Paypal Accounts Information-->
                </div>
                @if($accounts)
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($accounts as $account)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>
                                            {{ $account->account_name }}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ $account->email }}
                                        </strong>
                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#UpdatePaypalAccount{{ $account->id}}Modal" class="btn btn-primary btn-sm btn-rounded">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--begin::Update Account-->
                                    @include('Writer.Dashboard.PaypalAccounts.partials.UpdatePaypalAccountModal')
                                    <!--end::Update Account-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td>
                                        <form method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button formaction="{{ route('DeletePaypalAccount',$account->id) }}" class="btn btn-danger btn-sm btn-rounded">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                        </table>
                    </div>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                @else
                <!--begin::No Paypal Accounts-->
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="alert alert-danger text-center">
                        <div class="row d-flex mt-5 mb-3">
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                            <div class="col">
                                <h3><i class="fa-4x fa fa-exclamation-triangle"></i>
                                </h3>
                                <h4 class="card-title mt-4">
                                    <strong>No Paypal Account Found</strong>
                                </h4>
                            </div>
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                        </div>
                    </div>
                </div>
                <!--end::No Paypal Accounts-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                @endif
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
