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
                        <div class="card bg-transparent mb-0 text-center">
                            <div class="card-body">
                                <h2 class="text-info mb-4"><i class="fas fa-globe"></i> Plans For Countries</h2>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <h3 class="text-info mb-4 mt-4">
                                    <strong>
                                        {{ Plan::CountAddedCountries($plan->id) }}
                                        Countries Added
                                    </strong>
                                </h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Here you can Add & Remove Countries for this Plan.This Plan will be Displayed in these countries.</strong>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                            <div class="card-footer bg-transparent">
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Go back to Dashboard Button-->
                                <a href="{{ route('AdminDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Go back to Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create New Plan Button-->
                                <a href="{{ route('AdminCreatePlan') }}" class="btn waves-effect waves-light btn-rounded btn-primary"> <i class="fas fa-plus "></i> Create New Plan</a>
                                <!--end::Create New Plan Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Go back to Dashboard Button-->
                                <a href="{{ route('AdminPlansPricing') }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Plans & Pricing</a>
                                <!--end::Go back to Dashboard Button-->
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
                @if($countries)
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Native</th>
                                    <th>Phone</th>
                                    <th>Continent</th>
                                    <th>Capital</th>
                                    <th>Currency</th>
                                    <th>Languages</th>
                                    <th>Add/Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $country)
                                <tr class="text-center">
                                    <td>
                                        <strong>
                                            {{ $loop->iteration }}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>{{ $country->name }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $country->code }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $country->native }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $country->phone }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $country->continent }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $country->capital }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $country->currency }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $country->languages }}</strong>
                                    </td>
                                    <td>
                                        @if(Plan::CountryAlreadyAdded($plan->id,$country->id))
                                        <form method="post" action="{{ route('AdminRemovePlanCountries',[
                                            'plan' => $plan->id,
                                            'country' => $country->id,
                                            ]) }}">
                                            @csrf
                                            <button class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                                <i class="fas fa-minus-circle"></i>
                                            </button>
                                        </form>
                                        @else
                                        <a href="{{ route('AdminAddPlanCountries',[
                                            'plan' => $plan->id,
                                            'country' => $country->id,
                                            ]) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-plus "></i> </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                @else
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
                                    <strong>NO COUNTRIES FOUND</strong>
                                </h4>
                            </div>
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                        </div>
                    </div>
                </div>
                @endif
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
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
