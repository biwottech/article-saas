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
                                <h3>Payments Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-shopping-bag"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Subscriptions <strong>
                                                {{ Subscription::Count() }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-arrow-down"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Pay In <strong>
                                                {{ Subscription::Payments() }} USD
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-share-square"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Pay Out <strong>
                                                {{ Student::CountBlocked() }}
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
                                <a href="{{ route('AdminDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-2"> <i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::PayIn Button-->
                                <a href="{{ route('AdminPayIn') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2">
                                    <i class="fas fa-arrow-down"></i>
                                    View Pay In</a>
                                <!--end::PayIn Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::PayOut Button-->
                                <a href="{{ route('AdminPayOut') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-2">
                                    <i class="fas fa-share-square"></i> View Pay Out</a>
                                <!--end::PayOut Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Payments Button-->
                                <a href="{{ route('AdminPayments') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-2"> <i class="fas fa-long-arrow-alt-left"></i> Go to Payments</a>
                                <!--end::Payments Button-->
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
                    @if(!is_null($subscriptions))
                    <div class="table-responsive">
                        <!--begin::Filters-->
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navb">
                                <ul class="navbar-nav mr-auto">
                                    <!-- Dropdown -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                            Show
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('AdminPayIn',['page' => request('page') , 'result_status' => request('result_status') , 'status' => request('status')  ,'show' => 5]) }}"> 5 Per Page
                                            </a>
                                            @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('AdminPayIn',['page' => request('page') , 'result_status' => request('result_status') , 'status' => request('status')  ,'show' => $i]) }}">{{ $i }} Per Page
                                                </a>
                                                @endif
                                                @endfor
                                        </div>
                                    </li>
                                    <!-- Dropdown -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                            Filter by Plan Status
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('AdminPayIn',['page' => request('page'), 'show' => request('show') ,'plan_status' => 'active']) }}">Active</a>
                                            <a class="dropdown-item" href="{{ route('AdminPayIn',['page' => request('page'), 'show' => request('show') ,'plan_status' => 'cancelled']) }}">Cancelled</a>
                                            <a class="dropdown-item" href="{{ route('AdminPayIn',['page' => request('page'), 'show' => request('show') ,'plan_status' => 'ended']) }}">Ended</a>
                                        </div>
                                    </li>
                                    <!-- Dropdown -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('AdminPayIn') }}">
                                            Reset Filters
                                        </a>
                                    </li>
                                </ul>
                                <form class="form-inline my-2 my-lg-0" action="{{ route('AdminPayIn') }}">
                                    <input class="form-control" type="text" placeholder="Search" name="search">
                                    <button type="submit" class="btn btn-info" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </nav>
                        <!--end::Filters-->
                        <table id="zero_config" class="table table-responsive-sm table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Plan Name</th>
                                    <th>Trial Ends At</th>
                                    <th>Trial Status</th>
                                    <th>Plan Starts At</th>
                                    <th>Plan Ends At</th>
                                    <th>Plan Status</th>
                                    <th>Plan SignUp Fee</th>
                                    <th>Plan Price</th>
                                    <th>Plan Total Charge</th>
                                    <th>View Plan</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscriptions as $plan)
                                <tr class="text-center">
                                    <td>
                                        <strong>
                                            {{ $loop->iteration }}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ $plan->name }}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ date('d-M-Y',strtotime($plan->trial_ends_at)) }}
                                        </strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-info p-1">{{ $plan->trial_status}}</span>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ date('d-M-Y',strtotime($plan->plan_starts_at)) }}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ date('d-M-Y',strtotime($plan->plan_ends_at)) }}
                                        </strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-info p-1">{{ $plan->plan_status}}</span>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ $plan->plan_signup_fee }} USD
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ $plan->plan_price }} USD
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{ $plan->plan_total_charge }} USD
                                        </strong>
                                    </td>
                                    <td>
                                        <a href="{{ route('AdminEditPlan',$plan->plan_id) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('AdminDeleteSubscription',$plan->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--begin::Pagination-->
                        {{ $subscriptions->links()}}
                        <!--end::Pagination-->
                    </div>
                    @endif
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
