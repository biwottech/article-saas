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
                    <!--begin::Competetions Information-->
                    <div class="alert alert-info text-center">
                        <div class="card bg-transparent">
                            <div class="card-body">
                                <h3>{{ $student->name }} Competetions</h3>
                                <div class="row d-flex mt-5 mb-3">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-2 col-md-2">
                                        <h3><i class="fa-2x fa fa-rocket"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Initializing <strong>{{ Student::CountInitializingCompetetions($student->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-2 col-md-2">
                                        <h3><i class="fa-2x fa fa-user-clock"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Started <strong>{{ Student::CountStartedCompetetions($student->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-2 col-md-2">
                                        <h3><i class="fa-2x fa fa-pause-circle"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Paused <strong>{{ Student::CountPausedCompetetions($student->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-2 col-md-2">
                                        <h3><i class="fa-2x fa fa-clipboard-check"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Ended <strong>{{ Student::CountEndedCompetetions($student->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-2 col-md-2">
                                        <h3><i class="fa-2x fa fa-clock"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Pending <strong>{{ Student::CountPendingCompetetions($student->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-2 col-md-2">
                                        <h3><i class="fa-2x fa fa-trophy"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Announced <strong>{{ Student::CountAnnouncedCompetetions($student->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Go To Dashboard Button-->
                                <a href="{{ route('AdminDashboard') }}" class="btn btn-info btn-rounded mt-2"><i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Go To Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Go To Dashboard Button-->
                                <a href="{{ route('AdminViewStudent',$student->id) }}" class="btn btn-info btn-rounded mt-2"><i class="fas fa-long-arrow-alt-left"></i> Go to Student</a>
                                <!--end::Go To Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                        </div>
                    </div>
                    <!--end::Competetions Information-->
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-12">
                    @if($competetions)
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
                                        Show Results
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('AdminViewStudentCompetetions',['id' => $student->id ,'page' => request('page') , 'result_status' => request('result_status') , 'status' => request('status')  ,'show' => 5]) }}"> 5 Results
                                        </a>
                                        @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('AdminViewStudentCompetetions',['id' => $student->id ,'page' => request('page') , 'result_status' => request('result_status') , 'status' => request('status')  ,'show' => $i]) }}">{{ $i }} Results
                                            </a>
                                            @endif
                                            @endfor
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Filter by Status
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('AdminViewStudentCompetetions',['id' => $student->id ,'page' => request('page') ,'result_status' => request('result_status') , 'show' => request('show') ,'status' => 'initializing']) }}">Initializing</a>
                                        <a class="dropdown-item" href="{{ route('AdminViewStudentCompetetions',['id' => $student->id ,'page' => request('page') ,'result_status' => request('result_status') , 'show' => request('show') ,'status' => 'started']) }}">Started</a>
                                        <a class="dropdown-item" href="{{ route('AdminViewStudentCompetetions',['id' => $student->id ,'page' => request('page') ,'result_status' => request('result_status') , 'show' => request('show') ,'status' => 'paused']) }}">Paused</a>
                                        <a class="dropdown-item" href="{{ route('AdminViewStudentCompetetions',['id' => $student->id ,'page' => request('page') ,'result_status' => request('result_status') , 'show' => request('show') ,'status' => 'ended']) }}">Ended</a>
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Filter by Result
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('AdminViewStudentCompetetions',['id' => $student->id ,'page' => request('page'), 'show' => request('show') , 'status' => request('status') ,'result_status' => 'pending']) }}">Pending Results</a>
                                        <a class="dropdown-item" href="{{ route('AdminViewStudentCompetetions',['id' => $student->id ,'page' => request('page'), 'show' => request('show') , 'status' => request('status') ,'result_status' => 'announced']) }}">Announced Results</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('AdminViewStudentCompetetions',$student->id)}}">
                                        Reset Filters
                                    </a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action="{{ route('AdminViewStudentCompetetions',$student->id)}}">
                                <input class="form-control" type="text" placeholder="Search for Competetions" name="search_competetion">
                                <button type="submit" class="btn btn-info" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </nav>
                    <!--end::Filters-->
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-responsive-sm table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Description</th>
                                    <th>Ended At</th>
                                    <th>Result Status</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($competetions as $competetion)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $competetion->name }}</strong></td>
                                    <td>
                                        @if($competetion->status === "INITIALIZING")
                                        <span class="badge badge-success p-1">
                                            {{ $competetion->status }}
                                        </span>
                                        @endif
                                        @if($competetion->status === "STARTED")
                                        <span class="badge badge-info p-1">
                                            {{ $competetion->status }}
                                        </span>
                                        @endif
                                        @if($competetion->status === "PAUSED")
                                        <span class="badge badge-primary p-1">
                                            {{ $competetion->status }}
                                        </span>
                                        @endif
                                        @if($competetion->status === "ENDED")
                                        <span class="badge badge-danger p-1">
                                            {{ $competetion->status }}
                                        </span>
                                        @endif
                                    </td>
                                    <td><strong>{{ date('d-M-Y',strtotime($competetion->starting_date)) }}</strong></td>
                                    <td><strong>{{ date('d-M-Y',strtotime($competetion->ending_date)) }}</strong></td>
                                    <td><strong>{{ substr($competetion->description, 0, 10) }}....</strong></td>
                                    <td>
                                        <strong>
                                            @if(!is_null($competetion->ended_at))
                                            {{ date('d-M-Y',strtotime($competetion->ended_at)) }}
                                            @else
                                            --------
                                            @endif
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            @if(Competetion::HasNoResult($competetion->id))
                                            --------
                                            @endif
                                            @if(Competetion::ResultIsPending($competetion->id))
                                            <span class="badge badge-info p-1">
                                                {{ $competetion->result_status }}
                                            </span>
                                            @endif
                                            @if(Competetion::ResultIsAnnounced($competetion->id))
                                            <span class="badge badge-success p-1">
                                                {{ $competetion->result_status }}
                                            </span>
                                            @endif
                                        </strong>
                                    </td>
                                    <td>
                                        @csrf
                                        <a href="{{ route('AdminViewCompetetion',$competetion->id) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td> <a href="{{ route('EditCompetetion',$competetion->id) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#Delete{{ $competetion->id }}Competetion" class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <!--begin::Competetion Will be Deleted-->
                                        @include('Admin.Dashboard.Competetions.partials.Delete.DeleteCompetetionModal')
                                        <!--end::Competetion Will be Deleted-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--begin::Pagination-->
                        {{ $competetions->links() }}
                        <!--end::Pagination-->
                    </div>
                    @else
                    <div class="alert alert-danger text-center">
                        <div class="row d-flex mt-5 mb-3">
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                            <div class="col">
                                <h3><i class="fa-4x fa fa-exclamation-triangle"></i>
                                </h3>
                                <h4 class="card-title mt-4">
                                    <strong>NO COMPETETIONS FOUND</strong>
                                </h4>
                            </div>
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                        </div>
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
