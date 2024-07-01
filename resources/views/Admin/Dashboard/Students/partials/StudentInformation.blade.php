<!--******************************-->
<!--******************************-->
<!--******************************-->
<div class="col-12">
    <div class="alert alert-info text-center">
        <div class="card bg-transparent">
            <div class="card-body">
                <h3>{{ $student->name }} Information</h3>
                <div class="row d-flex mt-5 mb-3">
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <div class="col">
                        <h3><i class="fa-2x fa fa-newspaper"></i>
                        </h3>
                        <h4 class="card-title mt-4">
                            Total Articles <strong> {{ Student::CountArticles($student->id) }}</strong>
                        </h4>
                    </div>
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <div class="col">
                        <h3><i class="fa-2x fa fa-calendar-alt"></i>
                        </h3>
                        <h4 class="card-title mt-4">
                            Age Group <strong>{{ Student::Group($student->age_group_id) }}</strong>
                        </h4>
                    </div>
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <div class="col">
                        <h3><i class="fa-2x fab fa-paypal"></i>
                        </h3>
                        <h4 class="card-title mt-4">
                            Paypal Accounts <strong>{{ Student::CountPaypalAccounts($student->id) }}</strong>
                        </h4>
                    </div>
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <div class="col">
                        <h3><i class="fa-2x fa fa-clock"></i>
                        </h3>
                        <h4 class="card-title mt-4">
                            Competetions <strong>
                                {{ Student::CountCompetetions($student->id) }}
                            </strong>
                        </h4>
                    </div>
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                </div>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <a href="{{ route('AdminDashboard') }}" class="mb-3 mt-3 btn btn-info btn-rounded"><i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <a href="{{ route('AdminStudents') }}" class="mb-3 mt-3 btn btn-info btn-rounded"><i class="fas fa-user-graduate"></i> View Other Students</a>
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
