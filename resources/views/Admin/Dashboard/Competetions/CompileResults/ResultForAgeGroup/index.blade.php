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
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-12">
                    <!-- Alert with content -->
                    <div class="alert alert-info text-center">
                        <div class="card bg-transparent">
                            <div class="card-header bg-transparent">
                                <h3>Compile Results for {{ $group->group_from}}-{{ $group->group_to}} Years</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-calendar-alt"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Age Group
                                            <strong>
                                                {{ $group->group_from}}-{{ $group->group_to}} Years
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-user-graduate"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Participants <strong>{{ Competetion::CountParticipantsInAgeGroup($competetion->id,$group->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        <h3><i class="fa-4x fa fa-newspaper"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total Articles <strong>{{ Competetion::CountArticlesInAgeGroup($competetion->id,$group->id) }}</strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </div>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                @if(Request::path() != "Admin/Dashboard")
                                <!--begin::Go To Dashboard Button-->
                                <a href="{{ route('AdminDashboard') }}" class="btn btn-info btn-rounded mt-4"><i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Go To Dashboard Button-->
                                @endif
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                @if(Request::path() != "Admin/Competetions")
                                <!--begin::View Competetions Button-->
                                <a href="{{ route('AdminCompetetionsDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-4"><i class="fa fa-clock"></i> View Competetions</a>
                                <!--end::View Competetions Button-->
                                @endif
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Go To Competetion Button-->
                                <a href="{{ route('AdminViewCompetetion',$competetion->id) }}" class="btn btn-info btn-rounded mt-4"><i class="fas fa-long-arrow-alt-left"></i> Go to Competetion</a>
                                <!--end::Go To Competetion Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create New Competetion Button-->
                                <a href="{{ route('AdminCreateCompetetion') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-4"><i class="fa fa-plus"></i> Create New Competetion</a>
                                <!--end::Create New Competetion Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                @if(Competetion::IsEnded($competetion->id))
                                <!--begin::Compile Results Button-->
                                <a href="{{ route('AdminCompileResults',$competetion->id) }}" class="btn btn-info btn-rounded mt-4"><i class="fas fa-long-arrow-alt-left"></i> Go to Compile Results</a>
                                <!--end::Compile Results Button-->
                                @endif
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
                @if($articles)
                <!--begin::Age Group -->
                <div class="col-12">
                    <!--begin::Filters-->
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navb">
                            <ul class="navbar-nav mr-auto">
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Show Results
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('AdminCompileResultsForAgeGroup',['competetion' => $competetion->id,'group' => $group->id ,'page' => request('page') , 'status' => request('status') , 'visibility' => request('visibility')   ,'show' => 5]) }}"> 5 Results
                                        </a>
                                        @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('AdminCompileResultsForAgeGroup',['competetion' => $competetion->id,'group' => $group->id ,'page' => request('page') , 'status' => request('status') , 'visibility' => request('visibility')   ,'show' => $i]) }}">{{ $i }} Results
                                            </a>
                                            @endif
                                            @endfor
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Filter by Rating
                                    </a>
                                    <div class="dropdown-menu">
                                        @for($i=1;$i<6;$i++) <a class="dropdown-item" href="{{ route('AdminCompileResultsForAgeGroup',['competetion' => $competetion->id , 'group' => $group->id,'page' => request('page') , 'show' => request('show') ,
                                            'visibility' => request('visibility') ,'rating' => $i ]) }}">
                                            {{ $i }} Stars
                                            </a>
                                            @endfor
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Sort by Views
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('AdminCompileResultsForAgeGroup',['competetion' => $competetion->id , 'group' => $group->id,'page' => request('page') , 'show' => request('show') ,'sort' => 'asc']) }}">Ascending</a>
                                        <a class="dropdown-item" href="{{ route('AdminCompileResultsForAgeGroup',['competetion' => $competetion->id , 'group' => $group->id,'page' => request('page'), 'show' => request('show') ,'sort' => 'desc']) }}">Descending</a>
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('AdminCompileResultsForAgeGroup',['competetion' => $competetion->id,
                                'group' => $group->id ])}}">
                                        Reset Filters
                                    </a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action="{{ route('AdminCompileResultsForAgeGroup',['competetion' => $competetion->id,
                                'group' => $group->id ])}}">
                                <input class="form-control" type="text" placeholder="Search for Articles" name="search">
                                <button type="submit" class="btn btn-info" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </nav>
                    <!--end::Filters-->
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Article</th>
                                    <th>Views</th>
                                    <th>Stars</th>
                                    <th>Average Rating</th>
                                    <th>Submitted By</th>
                                    <th>
                                        Winning List
                                    </th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($articles as $article)
                                <tr>
                                    <td>
                                        <strong>
                                            {{ $loop->iteration }}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {!! substr(strip_tags($article->title), 0,15) . '...' !!}
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            {{
                                            Competetion::CountArticlesViews(
                                            $competetion->id, $article->id)
                                            }}
                                        </strong>
                                    </td>
                                    <td> {{--Start Rating--}}
                                        @for ($i = 0; $i < 5; $i++) @if (floor($article->averageRating()[0]) - $i >= 1)
                                            {{--Full Start--}}
                                            <i class="fas fa-star text-warning"> </i>
                                            @elseif ($article->averageRating()[0] - $i > 0)
                                            {{--Half Start--}}
                                            <i class="fas fa-star-half-alt text-warning"> </i>
                                            @else
                                            {{--Empty Start--}}
                                            <i class="far fa-star text-warning"> </i>
                                            @endif
                                            @endfor
                                            {{--End Rating--}}
                                    </td>
                                    @if($article->averageRating(1)[0] > 0)
                                    <td>
                                        <strong>{{ $article->averageRating(2)[0] }} based on {{ $article->countRating()[0] }} reviews
                                        </strong>
                                    </td>
                                    @else
                                    <td>
                                        <strong>0 Reviews
                                        </strong>
                                    </td>
                                    @endif
                                    <td>
                                        <a href="{{ route('AdminViewStudent',$article->user_id) }}" class="btn btn-sm waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-user-graduate"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post">
                                            @csrf
                                            @if(Competetion::ArticleAddedToWinningList($competetion->id,$article->id))
                                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-danger btn-sm">
                                                <i class="fas fa-minus-circle"></i>
                                            </button>
                                            @else
                                            <button type="submit" class="btn btn-sm waves-effect waves-light btn-rounded btn-primary">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('AdminReadArticle',$article->id) }}" class="btn btn-sm waves-effect waves-light btn-rounded btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--begin::Pagination-->
                        {{ $articles->links()}}
                        <!--end::Pagination-->
                    </div>
                </div>
                <!--end::Age Group-->
                @else
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::No Age Group Found-->
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="alert alert-danger text-center">
                        <div class="row d-flex mt-5 mb-3">
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                            <div class="col">
                                <h3><i class="fa-4x fa fa-exclamation-triangle"></i>
                                </h3>
                                <h4 class="card-title mt-4">
                                    <strong>NO ARTICLES FOUND</strong>
                                </h4>
                            </div>
                            <!--******************************-->
                            <!--******************************-->
                            <!--******************************-->
                        </div>
                    </div>
                </div>
                <!--end::No Age Group Found-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                @endif
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
            </div>
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
