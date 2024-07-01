@extends('layouts.Master')
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
                    <!--begin::Subscription Status-->
                    @include('Writer.Dashboard.partials.NoActiveSubscription')
                    <!--end::Subscription Status-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--begin::Competetions Information-->
                    @include('Writer.Dashboard.Competetions.partials.CompetetionsInfo')
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
                                        <a class="dropdown-item" href="{{ route('WriterCompetetions',['page' => request('page') , 'result_status' => request('result_status') , 'status' => request('status')  ,'show' => 5]) }}"> 5 Results
                                        </a>
                                        @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('WriterCompetetions',['page' => request('page') , 'result_status' => request('result_status') , 'status' => request('status')  ,'show' => $i]) }}">{{ $i }} Results
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
                                        <a class="dropdown-item" href="{{ route('WriterCompetetions',['page' => request('page') ,'result_status' => request('result_status') , 'show' => request('show') ,'status' => 'initializing']) }}">Initializing</a>
                                        <a class="dropdown-item" href="{{ route('WriterCompetetions',['page' => request('page') ,'result_status' => request('result_status') , 'show' => request('show') ,'status' => 'started']) }}">Started</a>
                                        <a class="dropdown-item" href="{{ route('WriterCompetetions',['page' => request('page') ,'result_status' => request('result_status') , 'show' => request('show') ,'status' => 'paused']) }}">Paused</a>
                                        <a class="dropdown-item" href="{{ route('WriterCompetetions',['page' => request('page') ,'result_status' => request('result_status') , 'show' => request('show') ,'status' => 'ended']) }}">Ended</a>
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Filter by Result
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('WriterCompetetions',['page' => request('page'), 'show' => request('show') , 'status' => request('status') ,'result_status' => 'pending']) }}">Pending Results</a>
                                        <a class="dropdown-item" href="{{ route('WriterCompetetions',['page' => request('page'), 'show' => request('show') , 'status' => request('status') ,'result_status' => 'announced']) }}">Announced Results</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('WriterCompetetions') }}">
                                        Reset Filters
                                    </a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action="{{ route('WriterCompetetions') }}">
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
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Ended At</th>
                                    <th>Result Status</th>
                                    <th>Submitted Articles</th>
                                    <th>Rated Articles</th>
                                    <th>Read Articles</th>
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
                                        {{ Writer::CountSubmittedInCompetetion(Auth::user()->id,$competetion->id)}}
                                    </td>
                                    <td>
                                        {{ Writer::CountSubmittedInCompetetion(Auth::user()->id,$competetion->id)}}
                                    </td>
                                    <td>
                                        <a href="#" class="btn-sm btn waves-effect waves-light btn-rounded btn-primary">
                                            <i class="fas fa-newspaper"></i>
                                        </a>
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
                                        <strong>NO COMPETETIONS FOUND</strong>
                                    </h4>
                                </div>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
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
