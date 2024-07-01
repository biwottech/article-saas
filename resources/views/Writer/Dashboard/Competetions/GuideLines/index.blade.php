@extends('layouts.Master')
@section('header-scripts')
@if(Competetion::IsStarted($competetion->id))
<!-- This Page CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/dist/css/jquery.countdown.css')}}">
@endif
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
                <div class="col-12">
                    <!--begin::Competetion Status-->
                    @include('Writer.Dashboard.Competetions.partials.index')
                    <!--end::Competetion Status-->
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Competetion Guide Lines-->
                <div class="col-12">
                    <div class="card" style="background-clip: border-box;border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;">
                        <div class="card-body">
                            <strong>
                                {!! $competetion->guide_lines!!}
                            </strong>
                        </div>
                    </div>
                </div>
                <!--end::Competetion Guide Lines-->
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
