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
                    <div class="alert alert-info text-center">
                        <div class="card bg-transparent">
                            <div class="card-header bg-transparent">
                                <h3>Plans & Pricing</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fas fa-4x fa-file-invoice-dollar"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Plans <strong>
                                                {{ Plan::CountAll() }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-check-circle"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Active Plans <strong>
                                                {{ Plan::CountActive() }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-ban"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Deactive Plans <strong>
                                                {{ Plan::CountDeactive() }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                                <p class="card-text">
                                    <strong>
                                    </strong>
                                </p>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Dashboard Button-->
                                <a href="{{ route('AdminDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create New Plan Button-->
                                <a href="{{ route('AdminCreatePlan') }}" class="btn waves-effect waves-light btn-rounded btn-primary"> <i class="fas fa-plus "></i> Create New Plan</a>
                                <!--end::Create New Plan Button-->
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
                @if($plans)
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>SignUp Fee</th>
                                    <th>Price</th>
                                    <th>Trial Duration</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Edit Plan</th>
                                    <th>Edit Features</th>
                                    <th>Countries Added</th>
                                    <th>View Countries</th>
                                    <th>Active/Deactive</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plans as $plan)
                                <tr class="text-center">
                                    <td>
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $plan->name }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $plan->description }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $plan->signup_fee }} USD</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $plan->price }} USD</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $plan->trial_period }} {{ ucfirst($plan->trial_interval) }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $plan->invoice_period }} {{ ucfirst($plan->invoice_interval) }}</strong>
                                    </td>
                                    <td>
                                        @if($plan->trashed())
                                        <span class="badge badge-danger p-1">
                                            Deactive
                                        </span>
                                        @else
                                        <span class="badge badge-info p-1">
                                            Active
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('AdminEditPlan',$plan->id) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('AdminEditFeatures',$plan->id) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-list"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ Plan::CountAddedCountries($plan->id) }}
                                        </strong>
                                    </td>
                                    <td>
                                        <a href="{{ route('AdminPlanCountries',$plan->id) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-primary">
                                            <i class="fas fa-globe"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($plan->trashed())
                                        <form method="post" action="{{ route('AdminActivatePlan',$plan->id) }}">
                                            @csrf
                                            <button type="submit" class="btn-sm btn waves-effect waves-light btn-rounded btn-info">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        @else
                                        <form method="post" action="{{ route('AdminDeactivatePlan',$plan->id) }}">
                                            @csrf
                                            <button type="submit" class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('AdminDeletePlan',$plan->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--begin::Pagination-->
                        {{ $plans->links() }}
                        <!--end::Pagination-->
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
                                    <strong>NO PLANS FOUND</strong>
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
