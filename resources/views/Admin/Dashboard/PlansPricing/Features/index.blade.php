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
                <div class="col-12">
                    <!-- Alert with content -->
                    <div class="alert alert-info text-center">
                        <div class="card bg-transparent">
                            <div class="card-header bg-transparent">
                                <h3>Plan Features</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="fas fa-4x fa-file-invoice-dollar"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            <strong>
                                                Name {{ $plan->name }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="fa-4x fa fa-dollar-sign"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            <strong>
                                                Price {{ $plan->price }} USD
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="fa-4x fa fa-user-plus"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            SignUp Fee <strong>
                                                {{ $plan->signup_fee }} USD
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="fa-4x fa fa-globe"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Countries Added <strong>
                                                {{ Plan::CountAddedCountries($plan->id) }}
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
                                <a href="{{ route('AdminDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create New Plan Button-->
                                <a href="{{ route('AdminCreatePlan') }}" class="btn waves-effect waves-light btn-rounded btn-primary"> <i class="fas fa-plus "></i> Create New Plan</a>
                                <!--end::Create New Plan Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Edit Plan Button-->
                                <a href="{{ route('AdminEditPlan',$plan->id) }}" class="btn waves-effect waves-light btn-rounded btn-primary"> <i class="fas fa-edit"></i> Edit Plan</a>
                                <!--end::Edit Plan Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Plans & Pricing Button-->
                                <a href="{{ route('AdminPlansPricing') }}" class="btn waves-effect waves-light btn-rounded btn-info"> <i class="fas fa-long-arrow-alt-left"></i> Go to Plans & Pricing</a>
                                <!--end::Plans & Pricing Button-->
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
                <!--begin::Create Plan Form-->
                <div class="col-12">
                    <form method="POST" action="{{ route('AdminUpdateFeatures',$features->id) }}">
                        @csrf
                        <!--**************************************-->
                        <!--**************************************-->
                        <!--**************************************-->
                        <div class="form-group row">
                            <div class="col mb-3">
                                <label for="competetion_quantity">Competetions Limit</label>
                                <input type="text" class="form-control @error('competetion_quantity') is-invalid @enderror" value="{{ $features->competetion_quantity }}" id="competetion_quantity" name="competetion_quantity" placeholder="Maximum Competetions Student can Join" required>
                                <small class="text-muted">
                                    Maximum Number of Competetions Student can Join.
                                </small>
                                @error('competetion_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="writing_quantity">Writing Limit</label>
                                <input type="text" class="form-control @error('writing_quantity') is-invalid @enderror" value="{{ $features->writing_quantity }}" id="writing_quantity" name="writing_quantity" placeholder="Maximum Articles Student can Write" required>
                                <small class="text-muted">
                                    Maximum Number of Articles Student can write.
                                </small>
                                @error('writing_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="reading_quantity">Reading Limit</label>
                                <input type="text" class="form-control @error('reading_quantity') is-invalid @enderror" value="{{ $features->reading_quantity }}" id="reading_quantity" name="reading_quantity" placeholder="Maximum Articles" required>
                                <small class="text-muted">
                                    Maximum Number of Articles Student must Read.
                                </small>
                                @error('reading_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--**************************************-->
                        <!--**************************************-->
                        <!--**************************************-->
                        <div class="form-group row">
                            <div class="col mb-3">
                                <label for="submit_quantity">Submitting Limit</label>
                                <input type="text" class="form-control @error('submit_quantity') is-invalid @enderror" value="{{ $features->submit_quantity }}" id="submit_quantity" name="submit_quantity" placeholder="Maximum Articles" required>
                                <small class="text-muted">
                                    Maximum Number of Articles Student can Submit.
                                </small>
                                @error('submit_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="rating_quantity">Rating Limit</label>
                                <input type="text" class="form-control @error('rating_quantity') is-invalid @enderror" value="{{ $features->rating_quantity }}" id="rating_quantity" name="rating_quantity" placeholder="Maximum Articles" required>
                                <small class="text-muted">
                                    Maximum Number of Articles Student must Rate.
                                </small>
                                @error('rating_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="can_update_after_joined">Can Update Submitted Articles</label>
                                <select class="form-control @error('can_update_after_joined') is-invalid @enderror" name="can_update_after_joined" id="can_update_after_joined">
                                    @if($features->can_update_after_joined == "true")
                                    <option value="true" selected="">Yes,Can Update</option>
                                    <option value="false">No,Can't Update</option>
                                    @else
                                    <option value="true">Yes,Can Update</option>
                                    <option value="false" selected="">No,Can't Update</option>
                                    @endif
                                </select>
                                <small>Can Update Submitted Articles After Joining the Competetion</small>
                                @error('can_update_after_joined')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--**************************************-->
                        <!--**************************************-->
                        <!--**************************************-->
                        <div class="form-group row">
                            <div class="col mb-3">
                                <button type="submit" class="btn btn-info btn-rounded">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Create Plan Form-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
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
