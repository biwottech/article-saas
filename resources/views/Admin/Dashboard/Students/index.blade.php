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
                                <h3>Students Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-user-graduate"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Students <strong>{{ Student::CountAll() }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-check-circle"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Active <strong>
                                                {{ Student::CountActive() }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-ban"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Blocked <strong>
                                                {{ Student::CountBlocked() }}
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
                                <!--begin::Student Age Groups Button-->
                                <a href="{{ route('AdminStudentAgeGroups') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-2">
                                    <i class="fas fa-calendar-alt"></i> View Age Groups</a>
                                <!--end::Student Age Groups Button-->
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
                <div class="col-12">
                    @if(!is_null($users))
                    <div class="table-responsive">
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
                                            Show Students
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('AdminStudents',['page' => request('page') , 'result_status' => request('result_status') , 'status' => request('status')  ,'show' => 5]) }}"> 5 Per Page
                                            </a>
                                            @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('AdminStudents',['page' => request('page') , 'result_status' => request('result_status') , 'status' => request('status')  ,'show' => $i]) }}">{{ $i }} Per Page
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
                                            <a class="dropdown-item" href="{{ route('AdminStudents',['page' => request('page') ,'age_group' => request('age_group') , 'show' => request('show') ,'status' => 'ActiveStudents']) }}">Active</a>
                                            <a class="dropdown-item" href="{{ route('AdminStudents',['page' => request('page') ,'age_group' => request('age_group') , 'show' => request('show') ,'status' => 'BlockedStudents']) }}">Blocked</a>
                                        </div>
                                    </li>
                                    <!-- Dropdown -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                            Filter by Age Groups
                                        </a>
                                        <div class="dropdown-menu">
                                            @foreach(AgeGroup::All() as $group)
                                            <a class="dropdown-item" href="{{ route('AdminStudents',['page' => request('page'), 'show' => request('show') , 'status' => request('status') ,'age_group' => $group->group_from.'-'.$group->group_to]) }}">
                                                {{ $group->group_from.'-'.$group->group_to }} Years
                                            </a>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('AdminStudents') }}">
                                            Reset Filters
                                        </a>
                                    </li>
                                </ul>
                                <form class="form-inline my-2 my-lg-0" action="{{ route('AdminStudents') }}">
                                    <input class="form-control" type="text" placeholder="Search for Competetions" name="search">
                                    <button type="submit" class="btn btn-info" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </nav>
                        <!--end::Filters-->
                        <table id="zero_config" class="table table-responsive-sm table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Age Group</th>
                                    <th>Status</th>
                                    <th>Block/Active</th>
                                    <th>View Student</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    @if(!is_null(Student::Group($user->age_group_id)))
                                    <td>{{ Student::Group($user->age_group_id) }}</td>
                                    @else
                                    NO AgeGroup
                                    @endif
                                    <td>
                                        @if($user->trashed())
                                        <span class="badge badge-danger p-1">Blocked</span>
                                        @else
                                        <span class="badge badge-info p-1">Active</span>
                                        @endif
                                    </td>
                                    @if($user->trashed())
                                    <td>
                                        <form method="post" action="{{ route('AdminRestoreStudent',$user->id) }}">
                                            @csrf
                                            <button type="submit" class="btn-sm btn waves-effect waves-light btn-rounded btn-success">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        <form method="post" action="{{ route('AdminBlockStudent',$user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                    <td> <a href="{{ route('AdminViewStudent',$user->id ) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a></td>
                                    <td>
                                        <form method="post" action="{{ route('AdminDeleteStudent',$user->id) }}">
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
                        {{ $users->links()}}
                        <!--end::Pagination-->
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
