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
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <!--begin::Plan Information-->
                    @include('Writer.Dashboard.PlansPricing.partials.PlanInformation')
                    <!--end::Plan Information-->
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Column -->
                <div class="col-md-12 col-lg-12 col-sm-12 mt-2 mb-5">
                    <div class="row">
                        <form class="w-100" method="post" id="SubscribeNow">
                            @csrf
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="table-responsive mt-2" style="clear: both;">
                                    <table class="table product-overview" id="zero_config">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center">Plan</th>
                                                <th style="text-align:center">Trial</th>
                                                <th style="text-align:center">Subscription</th>
                                                <th style="text-align:center">Invoice After</th>
                                                <th style="text-align:center">Sign Up Fee</th>
                                                <th style="text-align:center">Price</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!--******************************-->
                                                <!--******************************-->
                                                <!--******************************-->
                                                <td style="text-align:center">
                                                    <strong>
                                                        {{ $plan->name }}
                                                    </strong>
                                                </td>
                                                <!--******************************-->
                                                <!--******************************-->
                                                <!--******************************-->
                                                <td style="text-align:center">
                                                    <strong>
                                                        {{ $plan->trial_period }} {{ $plan->trial_interval }}
                                                    </strong>
                                                </td>
                                                <!--******************************-->
                                                <!--******************************-->
                                                <!--******************************-->
                                                <td style="text-align:center">
                                                    <strong>
                                                        {{ $plan->grace_period }} {{ $plan->grace_interval }}
                                                    </strong>
                                                </td>
                                                <!--******************************-->
                                                <!--******************************-->
                                                <!--******************************-->
                                                <td style="text-align:center">
                                                    <strong>
                                                        {{ $plan->invoice_period }} {{ $plan->invoice_interval }}
                                                    </strong>
                                                </td>
                                                <!--******************************-->
                                                <!--******************************-->
                                                <!--******************************-->
                                                <td style="text-align:center">
                                                    <strong>
                                                        ${{ $plan->signup_fee }}
                                                    </strong>
                                                </td>
                                                <!--******************************-->
                                                <!--******************************-->
                                                <!--******************************-->
                                                <td style="text-align:center">
                                                    <strong>
                                                        ${{ $plan->price }}
                                                    </strong>
                                                </td>
                                                <!--******************************-->
                                                <!--******************************-->
                                                <!--******************************-->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pull-right mt-2 text-right">
                                    <strong>Price ${{ $plan->price }} + SignUp Fee ${{ $plan->signup_fee }}</strong>
                                    <h3 class="mt-2"><b>Total :</b> ${{ $plan->price + $plan->signup_fee }}</h3>
                                </div>
                                @if($plan->price + $plan->signup_fee == 0)
                                <div class="pull-right text-right">
                                    <button formaction="{{ route('WriterFreePlan',$plan->price_id) }}" class="btn btn-info btn-rounded" type="submit"> Subscribe Free</button>
                                </div>
                                @else
                                <div class="pull-right text-right">
                                    <button formaction="{{ route('WriterPayNow',$plan->price_id) }}" class="btn btn-info btn-rounded" type="submit"><i class="fab fa-paypal"></i> Pay with Paypal </button>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                <!--end::Column -->
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
<script type="text/javascript">
$(document).ready(function() {
    $('#SubscribeNow').submit(function() {
        $(this).find('button[type=submit]').prop('disabled', true);
    });
});

</script>
@endsection
