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
                                <h3>Compile Results</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-calendar-alt"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Age Groups <strong>{{ Competetion::CountTotalAgeGroups($competetion->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-user-graduate"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Participants <strong>{{ Competetion::CountTotalParticipants($competetion->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-newspaper"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Articles <strong>{{ Competetion::CountTotalSubmittedArticles($competetion->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                @if(Request::path() != "Admin/Dashboard")
                                <!--begin::Go To Dashboard Button-->
                                <a href="{{ route('AdminDashboard') }}" class="btn btn-info btn-rounded mt-4"><i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Go To Dashboard Button-->
                                @endif
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                @if(Request::path() != "Admin/Competetions")
                                <!--begin::View Competetions Button-->
                                <a href="{{ route('AdminCompetetionsDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-4"><i class="fa fa-clock"></i> View Competetions</a>
                                <!--end::View Competetions Button-->
                                @endif
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Go To Competetion Button-->
                                <a href="{{ route('AdminViewCompetetion',$competetion->id) }}" class="btn btn-info btn-rounded mt-4"><i class="fas fa-long-arrow-alt-left"></i> Go to Competetion</a>
                                <!--end::Go To Competetion Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create New Competetion Button-->
                                <a href="{{ route('AdminCreateCompetetion') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-4"><i class="fa fa-plus"></i> Create New Competetion</a>
                                <!--end::Create New Competetion Button-->
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
                @if($age_groups)
                <!--begin::Age Group -->
                <div class="col-12">
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
                                        <a class="dropdown-item" href="{{ route('AdminCompileResults',['competetion' => $competetion->id , 'page' => request('page') , 'search' => request('search')  ,'show' => 5]) }}"> 5 Per Page
                                        </a>
                                        @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('AdminCompileResults',['competetion' => $competetion->id , 'page' => request('page') , 'search' => request('search') ,'show' => $i]) }}">{{ $i }} Per Page
                                            </a>
                                            @endif
                                            @endfor
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('AdminCompileResults',$competetion->id) }}">
                                        Reset Filters
                                    </a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action="{{ route('AdminCompileResults',$competetion->id) }}">
                                <input class="form-control" type="text" placeholder="Search" name="search">
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
                                    <th>Age Group</th>
                                    <th>Total Participants</th>
                                    <th>View Participants</th>
                                    <th>Total Articles</th>
                                    <th>View Articles</th>
                                    <th>Compile Results</th>
                                    <th>Result Status</th>
                                    <th>Delete Group</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($age_groups as $group)
                                <tr class="text-center">
                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                    <td><strong>{{ $group->group_from }}-{{ $group->group_to }} Years</strong></td>
                                    <td>
                                        <strong>{{ Competetion::CountParticipantsInAgeGroup($competetion->id,$group->id) }}</strong>
                                    </td>
                                    <td> <a href="{{ route('AdminViewParticipantsInAgeGroup',[
                                            'competetion' => $competetion->id,
                                            'group' => $group->id,
                                        ]) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <strong>{{ Competetion::CountArticlesInAgeGroup($competetion->id,$group->id) }}</strong>
                                    </td>
                                    <td> <a href="{{ route('AdminViewCompetetionArticlesInAgeGroup',[
                                            'competetion' => $competetion->id,
                                            'group' => $group->id,
                                        ]) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td> <a href="{{ route('AdminCompileResultsForAgeGroup',[
                                            'competetion' => $competetion->id,
                                            'group' => $group->id,
                                        ]) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-trophy"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">
                                            Compiled
                                        </span>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('AdminDeleteAgeGroup',$group->id) }}">
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
                        {{ $age_groups->links()}}
                        <!--end::Pagination-->
                    </div>
                </div>
                <!--end::Age Group-->
                @else
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::No Age Group Found-->
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
                                    <strong>NO AGE GROUP FOUND</strong>
                                </h4>
                            </div>
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                        </div>
                    </div>
                </div>
                <!--end::No Age Group Found-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                @endif
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
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
