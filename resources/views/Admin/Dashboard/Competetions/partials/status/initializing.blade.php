<div class="alert alert-info text-center">
    <div class="card bg-transparent">
        <div class="card-body">
            <h3>{{$competetion->name}} Information</h3>
            <div class="row d-flex mt-5 mb-3">
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <h3><i class="fa-4x fa fa-hourglass-start"></i>
                    </h3>
                    <h4 class="card-title mt-4">
                        Starting Date <strong>{{ date('d-M-Y',strtotime($competetion->starting_date)) }}</strong>
                    </h4>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <h3><i class="fa-4x fa fa-rocket"></i>
                    </h3>
                    <h4 class="card-title mt-4">
                        <strong>{{ __('INITIALIZING') }}</strong>
                    </h4>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <h3><i class="fa-4x fa fa-hourglass-start"></i>
                    </h3>
                    <h4 class="card-title mt-4">
                        Ending Date <strong>{{ date('d-M-Y',strtotime($competetion->ending_date)) }}</strong>
                    </h4>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
            </div>
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            <p class="card-text">
                <strong>
                    {!! $competetion->description !!}
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
            <!--begin::Create New Competetion Button-->
            <a href="{{ route('AdminCreateCompetetion') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2"><i class="fa fa-plus"></i> Create New Competetion</a>
            <!--end::Create New Competetion Button-->
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            <!--begin::Resume Now Button-->
            <a href="{{ route('AdminStartCompetetion',$competetion->id) }}" class="btn btn-info btn-rounded mt-2"><i class="fas fa-play-circle"></i> Start Now</a>
            <!--end::Resume Now Button-->
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
        </div>
    </div>
</div>
