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
            @if(Request::path() != "Writer/Dashboard")
            <!--begin::Go To Dashboard Button-->
            <a href="{{ route('WriterDashboard') }}" class="btn btn-info btn-rounded mt-2"><i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
            <!--end::Go To Dashboard Button-->
            @endif
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            @if(Request::path() != "Writer/Competetions")
            <!--begin::View Competetions Button-->
            <a href="{{ route('WriterCompetetions') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2"><i class="fa fa-clock"></i> View Other Competetions</a>
            <!--end::View Competetions Button-->
            @endif
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            @if(Request::path() != "Writer/Competetion/".$competetion->id."/GuideLines")
            <!--begin::View Competetions Button-->
            <a href="{{ route('WriterCompetetionGuideLines',$competetion->id) }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2"><i class="fa fa-info-circle"></i> View Guide Lines</a>
            <!--end::View Competetions Button-->
            @endif
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            @if(Request::path() == "Writer/Competetion/".$competetion->id."/GuideLines")
            <!--begin::Go To Dashboard Button-->
            <a href="{{ route('WriterJoinCompetetion',$competetion->id) }}" class="btn btn-primary btn-rounded mt-2"><i class="fas fa-long-arrow-alt-left"></i> Go to Competetion</a>
            <!--end::Go To Dashboard Button-->
            @endif
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            @if(Request::path() != "Writer/JoinedCompetetions")
            <!--begin::Joined Competetions Button-->
            <a href="{{ route('WriterJoinedCompetetions') }}" class="btn btn-info btn-rounded mt-2"><i class="fas fa-user-plus"></i> View Joined Competetions</a>
            <!--end::Joined Competetions Button-->
            @endif
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
        </div>
    </div>
</div>
