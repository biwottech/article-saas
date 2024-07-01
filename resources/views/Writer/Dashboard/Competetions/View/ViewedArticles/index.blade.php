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
                                <h3>Viewed Articles Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-3 col-md-3">
                                        <h3><i class="fas fa-newspaper fa-2x"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Total
                                            <strong>
                                                {{ Competetion::CountTotalReadArticles($competetion->id)}}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-3 col-md-3">
                                        <h3><i class="far fa-paper-plane fa-2x"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Published
                                            <strong>
                                                {{ Competetion::CountReadPublishedArticles($competetion->id)}}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-3 col-md-3">
                                        <h3><i class="fa-2x fa fa-archive"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Archived
                                            <strong>
                                                {{ Competetion::CountReadArchivedArticles($competetion->id)}}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col-sm-12 col-lg-3 col-md-3">
                                        <h3><i class="fas fa-ban fa-2x"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Banned
                                            <strong>
                                                {{ Competetion::CountReadBannedArticles($competetion->id)}}
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
                                <!--begin::Go To Competetion Button-->
                                <a href="{{ route('AdminViewCompetetion',$competetion->id) }}" class="btn btn-info btn-rounded mt-2"><i class="fas fa-long-arrow-alt-left"></i> Go to Competetion</a>
                                <!--end::Go To Competetion Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Create New Competetion Button-->
                                <a href="{{ route('AdminCreateCompetetion') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2"><i class="fa fa-plus"></i> Create New Competetion</a>
                                <!--end::Create New Competetion Button-->
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
                <div class="col-12">
                    @if($articles)
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
                                        <a class="dropdown-item" href="{{ route('AdminCompetetionSubmittedArticles',['id' => $competetion->id,'page' => request('page') , 'status' => request('status') , 'visibility' => request('visibility')   ,'show' => 5]) }}"> 5 Results
                                        </a>
                                        @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('AdminCompetetionSubmittedArticles',['id' => $competetion->id,'page' => request('page') , 'status' => request('status') , 'visibility' => request('visibility')   ,'show' => $i]) }}">{{ $i }} Results
                                            </a>
                                            @endif
                                            @endfor
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Filter by Status
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('AdminCompetetionSubmittedArticles',['id' => $competetion->id,'page' => request('page') , 'show' => request('show') ,
                                            'visibility' => request('visibility') ,'status' => 'active']) }}">Active</a>
                                        <a class="dropdown-item" href="{{ route('AdminCompetetionSubmittedArticles',['id' => $competetion->id,'page' => request('page') , 'show' => request('show') ,
                                            'visibility' => request('visibility') ,'status' => 'banned']) }}">Banned</a>
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Filter by Visibility
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('AdminCompetetionSubmittedArticles',['id' => $competetion->id,'page' => request('page') , 'show' => request('show') ,'visibility' => 'published']) }}">Published</a>
                                        <a class="dropdown-item" href="{{ route('AdminCompetetionSubmittedArticles',['id' => $competetion->id,'page' => request('page'), 'show' => request('show') ,'visibility' => 'archived']) }}">Archived</a>
                                    </div>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('AdminCompetetionSubmittedArticles',$competetion->id)}}">
                                        Reset Filters
                                    </a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action="{{ route('AdminCompetetionSubmittedArticles',$competetion->id)}}">
                                <input class="form-control" type="text" placeholder="Search for Articles" name="search">
                                <button type="submit" class="btn btn-info" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </nav>
                    <!--end::Filters-->
                    <div class="table-responsive">
                        <table class="table product-overview" id="zero_config">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Feature Image</th>
                                    <th>Article Info</th>
                                    <th style="text-align:center">Views</th>
                                    <th style="text-align:center">Status</th>
                                    <th style="text-align:center">Ban/Unban</th>
                                    <th style="text-align:center">Visibility</th>
                                    <th style="text-align:center">Publish/Archive</th>
                                    <th style="text-align:center">View</th>
                                    <th style="text-align:center">Edit</th>
                                    <th style="text-align:center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td>{{ $loop->iteration}}</td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td width="150">
                                        @if(!is_null($article->feature_image))
                                        <img src="{{ asset('Articles/'.$article->feature_image) }}" alt="{!! substr(strip_tags($article->title), 0, 5) . '...' !!}" width="80">
                                        @else
                                        <img src="{{ asset('Dashboard/assets/images/placeholder.png') }}" alt="{!! substr(strip_tags($article->title), 0, 5) . '...' !!}" width="80">
                                        @endif
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td width="550">
                                        <h5 class="font-500">
                                            {!! substr(strip_tags($article->title), 0, 30) . '...' !!}
                                        </h5>
                                        <p>
                                            {!! substr(strip_tags($article->content), 0, 45) . '...' !!}
                                        </p>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        <strong>
                                            {{ Article::Views($article->id)}}
                                        </strong>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        @if($article->status == "ACTIVE")
                                        <span class="badge badge-info p-1">
                                            {{ __('ACTIVE') }}
                                        </span>
                                        @endif
                                        @if($article->status == "BANNED")
                                        <span class="badge badge-danger p-1">
                                            {{ __('BANNED') }}
                                        </span>
                                        @endif
                                    </td>
                                    <td align="center">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        @if(Article::IsBanned($article->id))
                                        <form method="POST" action="{{ route('AdminUnBanAnArticle',$article->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light" title="" data-toggle="tooltip" data-original-title="Un-Ban Now"><i class="fas fa-check"></i></button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{ route('AdminBanAnArticle',$article->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" title="" data-toggle="tooltip" data-original-title="Ban Now"><i class="fas fa-ban"></i></button>
                                        </form>
                                        @endif
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td style="text-align:center">
                                        @if($article->visibility == "PUBLISHED")
                                        <span class="badge badge-info p-1">
                                            {{ __('PUBLISHED') }}
                                        </span>
                                        @endif
                                        @if($article->visibility == "ARCHIVED")
                                        <span class="badge badge-danger p-1">
                                            {{ __('ARCHIVED') }}
                                        </span>
                                        @endif
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td align="center">
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                        @if(Article::IsPublished($article->id))
                                        <form method="POST" action="{{ route('AdminArchiveAnArticle',$article->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" title="" data-toggle="tooltip" data-original-title="Archive Now"><i class="fas fa-archive"></i></button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{ route('AdminPublishAnArticle',$article->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm btn-rounded waves-effect waves-light" title="" data-toggle="tooltip" data-original-title="Publish Now"><i class="fas fa-paper-plane"></i></button>
                                        </form>
                                        @endif
                                        <!--******************************-->
                                        <!--******************************-->
                                        <!--******************************-->
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td align="center">
                                        <a class="btn btn-info btn-sm btn-rounded text-inverse" type="submit" href="{{ route('AdminReadArticle',$article->id) }}" title="" data-toggle="tooltip" data-original-title="View"><i class="fas fa-newspaper"></i></a>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td align="center">
                                        <a class="btn btn-info btn-sm btn-rounded" type="submit" href="{{ route('AdminEditArticle',$article->id) }}" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-pen"></i></a>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td align="center">
                                        <form method="POST" action="{{ route('AdminDeleteArticle',$article->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm btn-rounded text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--begin::Pagination-->
                        {{ $articles->links()}}
                        <!--end::Pagination-->
                    </div>
                    @else
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--begin::No Articles Found-->
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
                    <!--end::No Articles Found-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    @endif
                </div>
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
