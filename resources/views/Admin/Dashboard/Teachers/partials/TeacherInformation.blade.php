<!--******************************-->
<!--******************************-->
<!--******************************-->
<div class="col-12">
    <!-- Alert with content -->
    @if($teacher->trashed())
    <div class="alert alert-danger mb-3">
        @else
        <div class="alert alert-info mb-3">
            @endif
            <div class="card bg-transparent mb-0 text-center">
                <div class="card-body">
                    @if($teacher->trashed())
                    <h1 class="text-danger">
                        @else
                        <h1 class="text-info">
                            @endif
                            <i class="fa fa-user"></i>
                            {!! $teacher->name !!}
                            @if($teacher->trashed())
                            {{ __('(BLOCKED)') }}
                            @else
                            {{ __('(ACTIVE)')}}
                            @endif
                        </h1>
                        <!--******************************-->
                        <!--******************************-->
                        <!--******************************-->
                        <h4 class="mb-3 mt-3">Here you can Change Settings & You can Update Details & Information.</h4>
                        <!--******************************-->
                        <!--******************************-->
                        <!--******************************-->
                        <form method="POST">
                            @csrf
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                            <a href="{{ route('AdminDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                            @if($teacher->trashed())
                            <button type="submit" formaction="{{ route('AdminRestoreTeacher',$teacher->id) }}" class="mb-3 mt-3 btn btn-success btn-rounded">
                                <i class="fas fa-check"></i>
                                Activate Teacher</button>
                            @else
                            @method('DELETE')
                            <button type="submit" formaction="{{ route('AdminBlockTeacher',$teacher->id) }}" class="mb-3 mt-3 btn btn-danger btn-rounded">
                                <i class="fas fa-ban"></i>
                                Block Teacher</button>
                            @endif
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                            <a href="{{ route('AdminTeachers') }}" class="mb-3 mt-3 btn btn-primary btn-rounded">
                                <i class="fas fa-chalkboard-teacher"></i>
                                Other Teachers</a>
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                        </form>
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
