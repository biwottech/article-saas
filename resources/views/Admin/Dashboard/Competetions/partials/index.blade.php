<!--begin::Competetion Is Initializing-->
@if(Competetion::IsInitializing($competetion->id))
@include('Admin.Dashboard.Competetions.partials.status.initializing')
@endif
<!--end::Competetion Is Initializing-->
<!-- ============================================================== -->
<!--begin::Competetion Is Started-->
@if(Competetion::IsStarted($competetion->id))
@include('Admin.Dashboard.Competetions.partials.status.started')
@endif
<!--end::Competetion Is Started-->
<!-- ============================================================== -->
<!--begin::Competetion Is Pused-->
@if(Competetion::IsPaused($competetion->id))
@include('Admin.Dashboard.Competetions.partials.status.paused')
@endif
<!--end::Competetion Is Pused-->
<!-- ============================================================== -->
<!--begin::Competetion Is Ended-->
@if(Competetion::IsEnded($competetion->id))
@include('Admin.Dashboard.Competetions.partials.status.ended')
@endif
<!--end::Competetion Is Ended-->
