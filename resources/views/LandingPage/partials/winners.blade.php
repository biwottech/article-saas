@section('header-scripts')
<!-- This page plugin CSS -->
<link href="{{ asset('Dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Top Winners</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!--Winners-->
            <div class="col-12">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age Group</th>
                                <th>Position</th>
                                <th>Prize</th>
                                <th>Result Date</th>
                            </tr>
                        </thead>
                        @if($results)
                        <tbody>
                            @foreach($results as $result)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{!! UserHelper::Info($result->user_id)->name!!}</td>
                                <td>{!! UserHelper::Info($result->user_id)->email!!}</td>
                                <td>
                                    @if(!is_null(UserHelper::AgeGroup($result->age_group_id )))
                                    <strong class="badge badge-primary p-2">
                                        {{ UserHelper::AgeGroup($result->age_group_id )->description }}
                                    </strong>
                                    @else
                                    <strong class="badge badge-danger p-2">
                                        {{ __('No Age Group') }}
                                    </strong>
                                    @endif
                                </td>
                                <td> @if(!is_null($result->position))
                                    <strong class="badge badge-primary p-2">
                                        Position {{ $result->position }}
                                    </strong>
                                    @else
                                    <strong class="badge badge-danger p-2">
                                        {{ __('No Position') }}
                                    </strong>
                                    @endif
                                </td>
                                <td>
                                    @if(!is_null($result->prize))
                                    <strong class="badge badge-primary p-2">
                                        {{ $result->prize }} USD
                                    </strong>
                                    @else
                                    <strong class="badge badge-danger p-2">
                                        {{ __('No Position') }}
                                    </strong>
                                    @endif
                                </td>
                                <td> @if(!is_null($result->updated_at))
                                    <strong>
                                        {{ $result->updated_at }}
                                    </strong>
                                    @else
                                    <strong class="badge badge-danger p-2">
                                        {{ __('No Date') }}
                                    </strong>
                                    @endif</td>
                            </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
                <!--end::Table-->
            </div>
        </div>
    </div>
</div>
@section('footer-scripts')
<!--This page plugins -->
<script src="{{ asset('Dashboard/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{ asset('Dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endsection
