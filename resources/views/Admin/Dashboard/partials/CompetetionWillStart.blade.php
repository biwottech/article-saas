<!--begin::Competetion Will Start-->
<div class="alert alert-info">
    <div class="card bg-transparent">
        <div class="card-body">
            <h3 class="text-info"><i class="fa fa-stopwatch"></i>Competetion</h3>
            <h4 class="card-title mt-2">
                Competetion will start on <strong>{{ date('d-M-y',strtotime(Student::CompetetionInfo()->starting_date)) }}</strong> and End on <strong>{{ date('d-M-y',strtotime(Student::CompetetionInfo()->ending_date)) }}</strong>
            </h4>
            <p class="card-text">
                {!! Student::CompetetionInfo()->description !!}
            </p>
        </div>
        <div class="card-footer bg-transparent">
            <a href="{{ route('AdminCompetetionsDashboard') }}" class="btn btn-primary btn-rounded">View Details</a>
        </div>
    </div>
</div>
<!--begin::Competetion Will Start-->
