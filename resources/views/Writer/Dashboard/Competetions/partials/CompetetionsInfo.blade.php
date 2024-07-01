<div class="alert alert-info text-center">
    <div class="card bg-transparent">
        <div class="card-body">
            <h3>Competetions</h3>
            <div class="row d-flex mt-5 mb-3">
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-2 col-md-2">
                    <h3><i class="fa-2x fa fa-rocket"></i>
                    </h3>
                    <h4 class="card-title mt-4">
                        Initializing <strong>{{ Competetion::CountInitializing() }}</strong>
                    </h4>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-2 col-md-2">
                    <h3><i class="fa-2x fa fa-user-clock"></i>
                    </h3>
                    <h4 class="card-title mt-4">
                        Started <strong>{{ Competetion::CountStarted() }}</strong>
                    </h4>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-2 col-md-2">
                    <h3><i class="fa-2x fa fa-pause-circle"></i>
                    </h3>
                    <h4 class="card-title mt-4">
                        Paused <strong>{{ Competetion::CountPaused() }}</strong>
                    </h4>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-2 col-md-2">
                    <h3><i class="fa-2x fa fa-clipboard-check"></i>
                    </h3>
                    <h4 class="card-title mt-4">
                        Ended <strong>{{ Competetion::CountEnded() }}</strong>
                    </h4>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-2 col-md-2">
                    <h3><i class="fa-2x fa fa-clock"></i>
                    </h3>
                    <h4 class="card-title mt-4">
                        Pending <strong>{{ Competetion::CountPendingResults() }}</strong>
                    </h4>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-2 col-md-2">
                    <h3><i class="fa-2x fa fa-trophy"></i>
                    </h3>
                    <h4 class="card-title mt-4">
                        Announced <strong>{{ Competetion::CountAnnouncedResults() }}</strong>
                    </h4>
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
            </div>
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
            <a href="{{ route('WriterCompetetions') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2"><i class="fa fa-clock"></i> View Competetions</a>
            <!--end::View Competetions Button-->
            @endif
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
            @if(Request::path() != "Writer/JoinedCompetetions")
            <!--begin::Joined Competetions Button-->
            <a href="{{ route('WriterJoinedCompetetions') }}" class="btn btn-primary btn-rounded mt-2"><i class="fas fa-user-plus"></i> View Joined Competetions</a>
            <!--end::Joined Competetions Button-->
            @endif
            <!--******************************-->
            <!--******************************-->
            <!--******************************-->
        </div>
    </div>
</div>
