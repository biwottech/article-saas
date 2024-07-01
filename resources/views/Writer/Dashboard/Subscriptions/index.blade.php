@extends('layouts.Master')
@section('header-scripts')
<!-- Custom CSS -->
<link href="{{ asset('Dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
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
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <!--begin::Plan Information-->
                    @include('Writer.Dashboard.PlansPricing.partials.PlanInformation')
                    <!--end::Plan Information-->
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                @if($subscriptions)
                <!--begin::Column -->
                <div class="col-md-12 col-lg-12 col-sm-12 mt-2 mb-5">
                    <div class="table-responsive">
                        <table class="table product-overview" id="zero_config">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center">Plan</th>
                                    <th style="text-align:center">Trial Duration</th>
                                    <th style="text-align:center">Remaining Days</th>
                                    <th style="text-align:center">Trial Status</th>
                                    <th style="text-align:center">Plan Starts</th>
                                    <th style="text-align:center">Plan Ends</th>
                                    <th style="text-align:center">Remaining Days</th>
                                    <th style="text-align:center">Plan Status</th>
                                    <th style="text-align:center">Sign Up Fee</th>
                                    <th style="text-align:center">Price</th>
                                    <th style="text-align:center">Cancel/Join</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscriptions as $subscription)
                                <tr>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td>{{ $loop->iteration}}</td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        <strong>
                                            {{ $subscription->name }}
                                        </strong>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        <strong>
                                            {{ Writer::findPlan($subscription->plan_id)->trial_period }}
                                            {{ Writer::findPlan($subscription->plan_id)->trial_interval }}s
                                        </strong>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        <strong>
                                            {{ Writer::TrialRemainingDays($subscription->user_id,$subscription->plan_id) }} days
                                        </strong>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        @if($subscription->trial_status == "ACTIVE")
                                        <strong>
                                            <span class="badge badge-info badge-rounded p-1">
                                                {{ $subscription->trial_status }}
                                            </span>
                                        </strong>
                                        @else
                                        <strong>
                                            <span class="badge badge-danger badge-rounded p-1">
                                                {{ $subscription->trial_status }}
                                            </span>
                                        </strong>
                                        @endif
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        <strong>
                                            {{ date('d-M-Y',strtotime($subscription->plan_starts_at)) }}
                                        </strong>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        <strong>
                                            {{ date('d-M-Y',strtotime($subscription->plan_ends_at)) }}
                                        </strong>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        <strong>
                                            {{ Writer::PlanRemainingDays($subscription->user_id,$subscription->plan_id) }} days
                                        </strong>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        @if($subscription->plan_status == "ACTIVE")
                                        <strong>
                                            <span class="badge badge-info badge-rounded p-1">
                                                {{ $subscription->plan_status }}
                                            </span>
                                        </strong>
                                        @else
                                        <strong>
                                            <span class="badge badge-danger badge-rounded p-1">
                                                {{ $subscription->plan_status }}
                                            </span>
                                        </strong>
                                        @endif
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        <strong>
                                            ${{ $subscription->plan_signup_fee }}
                                        </strong>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        <strong>
                                            ${{ $subscription->plan_price }}
                                        </strong>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td align="center">
                                        @if(Writer::IsCanceled(Auth::user()->id,$subscription->plan_id))
                                        <form method="POST" action="{{ route('WriterResumePlan',$subscription->plan_id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm btn-rounded text-inverse" title="" data-toggle="tooltip" data-original-title="Resume"><i class="fas fa-check"></i></button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{ route('WriterCancelPlan',$subscription->plan_id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm btn-rounded text-inverse" title="" data-toggle="tooltip" data-original-title="Cancel"><i class="fas fa-ban"></i></button>
                                        </form>
                                        @endif
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--******************************-->
                        <!--******************************-->
                        <!--******************************-->
                    </div>
                </div>
                <!--end::Column -->
                @endif
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
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
<!-- ============================================================== -->
@endsection
@section('footer-scripts')
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script src="{{ asset('Dashboard/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{ asset('Dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endsection
