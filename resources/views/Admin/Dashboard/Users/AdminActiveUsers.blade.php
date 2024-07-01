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
                            <h4 class="card-title">Active Users</h4>
                            @if(!is_null($users))
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th>Age</th>
                                            <th>Role</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</</td> <td>{{ $user->country }}</</td> <td>{{ UserHelper::age($user->date_of_birth) }}</td>
                                            <td>{{ $user->type }}</td>
                                            <td>{{ $user->role }}</td>
                                            @if($user->trashed())
                                            <td>
                                                <form method="post" action="{{ route('AdminRestoreUser',$user->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success">Activate</button>
                                                </form>
                                            </td>
                                            @else
                                            <td>
                                                <form method="post" action="{{ route('AdminBlockUser',$user->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn waves-effect waves-light btn-rounded btn-danger">Block</button>
                                                </form>
                                            </td>
                                            @endif
                                            <td><a href="{{ route('AdminEditUser',$user->id ) }}" class="btn waves-effect waves-light btn-rounded btn-info">Edit</a></td>
                                            <td>
                                                <form method="post" action="{{ route('AdminDeleteUser',$user->id) }}">
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th>Age</th>
                                            <th>Role</th>
                                            <th>Type</th>
                                            <th>Status</th>
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
