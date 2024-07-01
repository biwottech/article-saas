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
                                <h3>Age Groups Information</h3>
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
                                            Total Age Groups <strong>
                                                {{ AgeGroup::CountAll()}}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-user-graduate"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Students<strong>
                                                {{ Student::CountAll()}}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-newspaper"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Articles<strong>
                                                {{ Article::CountAll()}}
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
                                <!--begin::Dashboard Button-->
                                <a href="{{ route('AdminTeachers') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    View Teachers</a>
                                <!--end::Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::View Students Button-->
                                <a href="{{ route('AdminStudents') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-2">
                                    <i class="fas fa-user-graduate"></i> View Students</a>
                                <!--end::View Students Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create Age Group Button-->
                                <a href="{{ route('AdminCreateAgeGroup') }}" class="btn btn-primary btn-rounded mt-2"><i class="fas fa-plus"></i> Create Age Group</a>
                                <!--end::Create Age Group Button-->
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
                                        <a class="dropdown-item" href="{{ route('AdminStudentAgeGroups',['page' => request('page') , 'search' => request('search')  ,'show' => 5]) }}"> 5 Per Page
                                        </a>
                                        @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('AdminStudentAgeGroups',['page' => request('page') , 'search' => request('search') ,'show' => $i]) }}">{{ $i }} Per Page
                                            </a>
                                            @endif
                                            @endfor
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('AdminStudentAgeGroups') }}">
                                        Reset Filters
                                    </a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action="{{ route('AdminStudentAgeGroups') }}">
                                <input class="form-control" type="text" placeholder="Search for Competetions" name="search">
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
                                    <th>Age From</th>
                                    <th>Age To</th>
                                    <th>Description</th>
                                    <th>Total Students</th>
                                    <th>View Students</th>
                                    <th>Edit Group</th>
                                    <th>Delete Group</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($age_groups as $group)
                                <tr class="text-center">
                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                    <td><strong>{{ $group->group_from }}</strong></td>
                                    <td><strong>{{ $group->group_to }}</strong></td>
                                    <td><strong>{{ $group->description }}</strong></td>
                                    <td>
                                        <strong>{{ AgeGroup::CountStudentsInSpecific($group->id) }}</strong>
                                    </td>
                                    <td> <a href="{{ route('AdminStudentGroups',$group->id) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td> <a href="{{ route('AdminEditAgeGroup',$group->id ) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
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
                        {{ $age_groups->links() }}
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
