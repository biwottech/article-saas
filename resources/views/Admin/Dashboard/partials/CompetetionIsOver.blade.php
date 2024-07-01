<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Competetion Ended</h4>
            </div>
            <div class="card-body text-dark">
                <h3 class="card-title">
                    Competetion was started on <strong>{{ Student::CompetetionInfo()->starting_date }}</strong> and Ended on <strong>{{ Student::CompetetionInfo()->ending_date }}</strong>
                </h3>
            </div>
        </div>
    </div>
</div>
