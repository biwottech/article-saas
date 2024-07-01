<div class="alert alert-info">
    <div class="card bg-transparent">
        <div class="card-body">
            <h3 class="text-info"><i class="fa fa-clock"></i> Competetion</h3>
            <h4 class="card-title mt-2">
                Competetion was Started on <strong>{{ date("d-M-Y",strtotime(Student::CompetetionInfo()->starting_date)) }}</strong>
            </h4>
            <p class="card-text text-center"><span id="countdown"></span></p>
            <h4 class="card-title mt-2">
                Competetion will End on <strong id="year"></strong>
            </h4>
        </div>
        <div class="card-footer bg-transparent">
            <a href="{{ route('AdminCompetetionsDashboard') }}" class="btn btn-info btn-rounded">View Details</a>
        </div>
    </div>
</div>
