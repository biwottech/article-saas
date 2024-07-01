@extends('layouts.Master')
@section('content')
<!--begin::Preloader-->
@include('User.Dashboard.partials.Preloader')
<!--end::Preloader-->
<!--begin::Page Wrapper-->
<div id="main-wrapper">
    <!--begin::Topbar header-->
    @include('User.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('User.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Topbar header-->
    @include('User.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('User.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Page Wrapper-->
    <div class="page-wrapper">
        <!--begin::BreadCrumb-->
        @include('User.Dashboard.partials.BreadCrumb')
        <!--end::BreadCrumb-->
        <!--begin::Content-->
        <div class="container-fluid">
            <!--begin::Page Content-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            This is some text within a card block.
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Page Content-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        @include('User.Dashboard.partials.Footer')
        <!--end::Footer-->
    </div>
    <!--end::Page Wrapper-->
</div>
<!--end::Wrapper-->
<!--begin::RightAsideCustomizer-->
@include('User.Dashboard.partials.RightAsideCustomizer')
<!--end::RightAsideCustomizer-->
<div class="chat-windows"></div>
@endsection
