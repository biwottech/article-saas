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
                    <div class="alert alert-info mb-5">
                        <div class="card bg-transparent mb-0">
                            <div class="card-body">
                                <h3 class="text-info"><i class="fa fa-edit"></i> Update {{ $competetion->name }}</h3>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <strong class="mb-3 mt-5">Here you can Update the Competetion.</strong>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                            <div class="card-footer bg-transparent">
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Dashboard Button-->
                                <a href="{{ route('AdminDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::View Competetions Button-->
                                <a href="{{ route('AdminCompetetionsDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fa fa-clock"></i> View Competetions</a>
                                <!--end::View Competetions Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Go To Competetion Button-->
                                <a href="{{ route('AdminViewCompetetion',$competetion->id) }}" class="btn btn-info btn-rounded "><i class="fas fa-long-arrow-alt-left"></i> Go to Competetion</a>
                                <!--end::Go To Competetion Button-->
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
                    <form method="POST" action="{{ route('AdminUpdateCompetetion',$competetion->id) }}">
                        @csrf
                        <div class="col mb-3">
                            <label for="name">Competetion Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $competetion->name }}" id="name" name="name" placeholder="Competetion Name">
                            <small class="text-dark">Set a Name for the Competetion.</small>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="starting_date">Starting Date</label>
                            <input type="date" class="form-control @error('starting_date') is-invalid @enderror" value="{{ $competetion->starting_date }}" id="starting_date" name="starting_date" placeholder="Starting Date">
                            <small class="text-dark">Set Starting Date.It can be Today Or any Future Date</small>
                            @error('starting_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="phone">Ending Date</label>
                            <input type="date" class="form-control @error('ending_date') is-invalid @enderror" value="{{ $competetion->ending_date }}" id="ending_date" name="ending_date" placeholder="Ending Date">
                            <small class="text-dark">Set Ending Date.It can any Future Date.Any Duration</small>
                            @error('ending_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="address">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Write Some Description">{{ $competetion->description }}</textarea>
                            <small class="text-dark">Write Some Description</small>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="guides">Guide Lines</label>
                            <textarea class="form-control @error('guides') is-invalid @enderror" id="guides" name="guides" placeholder="Write Some Guide Lines">{{ $competetion->guide_lines }}</textarea>
                            <small class="text-dark">These guides will be Only for this Competetion.These Guides will Display.Write Some Guide Lines Or Rules & Regulations.</small>
                            @error('guides')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <button type="submit" class="btn btn-info btn-rounded">Save Changes</button>
                        </div>
                    </form>
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
