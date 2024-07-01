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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <h4 class="card-title">Age Groups</h4>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('AdminCreateAgeGroup') }}" class="btn waves-effect waves-light btn-rounded btn-info float-right">
                                        <i class="fas fa-plus"></i> Create Age Group</a>
                                </div>
                            </div>
                            @if(!is_null($age_groups))
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Groups</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($age_groups as $age)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $age->group_from."-".$age->group_to }}</td>
                                            <td>{{ $age->description }}</td>
                                            <td><a href="{{ route('AdminEditAgeGroup',$age->id) }}" class="btn waves-effect waves-light btn-rounded btn-info">Edit</a></td>
                                            <td>
                                                <form method="post" action="{{ route('AdminDeleteAgeGroup',$age->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn waves-effect waves-light btn-rounded btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Groups</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
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
<div class="chat-windows"></div>
@section('footer-scripts')
<!--This page plugins -->
<script src="{{ asset('Dashboard/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{ asset('Dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endsection
@endsection
