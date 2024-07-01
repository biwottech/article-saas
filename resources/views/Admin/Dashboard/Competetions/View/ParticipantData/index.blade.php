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
                                <h3>{{ $user->name }} Data</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-newspaper"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Submitted Articles <strong>{{ Competetion::CountParticipantSubmittedArticles($competetion->id,$user->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-star"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Rated Articles <strong>
                                                {{ Competetion::CountParticipantRatedArticles($competetion->id,$user->id) }}
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
                                            Read Articles <strong>
                                                {{ Competetion::CountParticipantReadArticles($competetion->id,$user->id) }}
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
                                @if(Request::path() != "Admin/Dashboard")
                                <!--begin::Go To Dashboard Button-->
                                <a href="{{ route('AdminDashboard') }}" class="btn btn-info btn-rounded mt-2"><i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Go To Dashboard Button-->
                                @endif
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                @if(Request::path() != "Admin/Competetions")
                                <!--begin::View Competetions Button-->
                                <a href="{{ route('AdminCompetetionsDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2"><i class="fa fa-clock"></i> View Competetions</a>
                                <!--end::View Competetions Button-->
                                @endif
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Go To Competetion Button-->
                                <a href="{{ route('AdminViewCompetetion',$competetion->id) }}" class="btn btn-info btn-rounded mt-2"><i class="fas fa-long-arrow-alt-left"></i> Go to Competetion</a>
                                <!--end::Go To Competetion Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create New Competetion Button-->
                                <a href="{{ route('AdminCreateCompetetion') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2"><i class="fa fa-plus"></i> Create New Competetion</a>
                                <!--end::Create New Competetion Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                @if(Competetion::IsEnded($competetion->id))
                                <!--begin::Compile Results Button-->
                                <a href="{{ route('AdminCompileResults',$competetion->id) }}" class="btn btn-primary btn-rounded mt-2"><i class="fas fa-paste"></i> Compile Results</a>
                                <!--end::Compile Results Button-->
                                @endif
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
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-responsive-sm table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Submitted Articles</th>
                                    <th>Need to View</th>
                                    <th>Viewed Articles</th>
                                    <th>Need to Rate</th>
                                    <th>Rated Articles</th>
                                    <th>Status</th>
                                    <th>Competetion Status</th>
                                    <th>Qualify/Disqualify</th>
                                    <th>Block/Active</th>
                                    <th>View Student</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <!--seperater-->
                                    <td><strong>{{ Competetion::CountParticipantSubmittedArticles($competetion->id,$user->id) }}</strong></td>
                                    <!--seperater-->
                                    <td><strong>{{ Competetion::ParticipantNeedToRead($competetion->id,$user->id)}}</strong></td>
                                    <!--seperater-->
                                    <td><strong>{{ Competetion::CountParticipantReadArticles($competetion->id,$user->id) }}</strong></td>
                                    <!--seperater-->
                                    <td><strong>{{ Competetion::ParticipantNeedToRate($competetion->id,$user->id)}}</strong></td>
                                    <!--seperater-->
                                    <td><strong>{{ Competetion::CountParticipantRatedArticles($competetion->id,$user->id) }}</strong></td>
                                    <!--seperater-->
                                    <td>
                                        @if($user->trashed())
                                        <span class="badge badge-danger p-1">Blocked</span>
                                        @else
                                        <span class="badge badge-info p-1">Active</span>
                                        @endif
                                    </td>
                                    <!--seperater-->
                                    <td>
                                        @if(Competetion::ParticipantIsQualified($competetion->id,$user->id))
                                        <span class="badge badge-info p-1">Qualified</span>
                                        @else
                                        <span class="badge badge-danger p-1">Disqualified</span>
                                        @endif
                                    </td>
                                    <!--seperater-->
                                    @if($user->trashed())
                                    <td>
                                        <form method="post" action="{{ route('AdminRestoreStudent',$user->id) }}">
                                            @csrf
                                            <button type="submit" class="btn-sm btn waves-effect waves-light btn-rounded btn-success">
                                                <i class="fas fa-trophy"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <!--seperater-->
                                    @else
                                    <!--seperater-->
                                    <td>
                                        <form method="post" action="{{ route('AdminBlockStudent',$user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                                <i class="fas fa-user-slash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <!--seperater-->
                                    @endif
                                    @if($user->trashed())
                                    <!--seperater-->
                                    <td>
                                        <form method="post" action="{{ route('AdminRestoreStudent',$user->id) }}">
                                            @csrf
                                            <button type="submit" class="btn-sm btn waves-effect waves-light btn-rounded btn-success">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <!--seperater-->
                                    @else
                                    <!--seperater-->
                                    <td>
                                        <form method="post" action="{{ route('AdminBlockStudent',$user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <!--seperater-->
                                    @endif
                                    <td>
                                        <!--seperater--> <a href="{{ route('AdminViewStudent',$user->id ) }}" class="btn-sm btn waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <!--seperater-->
                                    <td>
                                        <form method="post" action="{{ route('AdminDeleteStudent',$user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn waves-effect waves-light btn-rounded btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <!--seperater-->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
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
