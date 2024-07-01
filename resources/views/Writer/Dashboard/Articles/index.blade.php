@extends('layouts.Master')
@section('content')
<!--begin::Preloader-->
@include('Writer.Dashboard.partials.Preloader')
<!--end::Preloader-->
<!--begin::Page Wrapper-->
<div id="main-wrapper">
    <!--begin::Topbar header-->
    @include('Writer.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('Writer.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Topbar header-->
    @include('Writer.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('Writer.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Page Wrapper-->
    <div class="page-wrapper">
        <!--begin::BreadCrumb-->
        @include('Writer.Dashboard.partials.BreadCrumb')
        <!--end::BreadCrumb-->
        <!--begin::Content-->
        <div class="container-fluid">
            <!--begin::Page Content-->
            <div class="row">
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--begin::Subscription Status-->
                    @include('Writer.Dashboard.partials.NoActiveSubscription')
                    <!--end::Subscription Status-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <div class="alert alert-info text-center">
                        <div class="card bg-transparent">
                            <div class="card-header bg-transparent">
                                <h3>Articles Information</h3>
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
                                                {{ Writer::CountAll() }}
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
                                                {{ Writer::CountPublished()}}
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
                                                {{ Writer::CountArchived()}}
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
                                                {{ Writer::CountBanned()}}
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
                                <!--begin::Dashboard Button-->
                                <a href="{{ route('WriterDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-2"> <i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Write Article Button-->
                                <a href="{{ route('WriterWriteArticle') }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2"> <i class="fas fa-edit"></i> Write Article</a>
                                <!--end::Write Article Button-->
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
                <!--begin::Column -->
                <div class="col-md-12 col-lg-12 col-sm-12 mt-2 mb-5">
                    <div class="table-responsive">
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
                                            <a class="dropdown-item" href="{{ route('WriterArticles',['page' => request('page') , 'status' => request('status') , 'visibility' => request('visibility')   ,'show' => 5]) }}"> 5 Results
                                            </a>
                                            @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('WriterArticles',['page' => request('page') , 'status' => request('status') , 'visibility' => request('visibility')   ,'show' => $i]) }}">{{ $i }} Results
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
                                            <a class="dropdown-item" href="{{ route('WriterArticles',['page' => request('page') , 'show' => request('show') ,
                                            'visibility' => request('visibility') ,'status' => 'active']) }}">Active</a>
                                            <a class="dropdown-item" href="{{ route('WriterArticles',['page' => request('page') , 'show' => request('show') ,
                                            'visibility' => request('visibility') ,'status' => 'banned']) }}">Banned</a>
                                        </div>
                                    </li>
                                    <!-- Dropdown -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                            Filter by Visibility
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('WriterArticles',['page' => request('page') , 'show' => request('show') ,'visibility' => 'published']) }}">Published</a>
                                            <a class="dropdown-item" href="{{ route('WriterArticles',['page' => request('page'), 'show' => request('show') ,'visibility' => 'archived']) }}">Archived</a>
                                        </div>
                                    </li>
                                    <!-- Dropdown -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('WriterArticles') }}">
                                            Reset Filters
                                        </a>
                                    </li>
                                </ul>
                                <form class="form-inline my-2 my-lg-0" action="{{ route('WriterArticles') }}">
                                    <input class="form-control" type="text" placeholder="Search for Articles" name="search">
                                    <button type="submit" class="btn btn-info" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </nav>
                        <!--end::Filters-->
                        <table class="table product-overview" id="zero_config">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Feature Image</th>
                                    <th>Article Info</th>
                                    <th style="text-align:center">Views</th>
                                    <th style="text-align:center">Status</th>
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
                                        <img src="{{ asset('Articles/FeatureImages/'.$article->feature_image) }}" alt="{!! substr(strip_tags($article->title), 0, 5) . '...' !!}" width="80">
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
                                        <form method="POST" action="{{ route('WriterArchiveArticle',$article->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" title="" data-toggle="tooltip" data-original-title="Archive Now"><i class="fas fa-archive"></i></button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{ route('WriterPublishArticle',$article->id) }}">
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
                                        <a class="btn btn-info btn-sm btn-rounded text-inverse" type="submit" href="{{ route('WriterReadArticle',$article->id) }}" title="" data-toggle="tooltip" data-original-title="View"><i class="fas fa-newspaper"></i></a>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td align="center">
                                        <a class="btn btn-info btn-sm btn-rounded" type="submit" href="{{ route('WriterEditArticle',$article->id) }}" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-pen"></i></a>
                                    </td>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <td align="center">
                                        <form method="POST" action="{{ route('WriterDeleteArticle',$article->id) }}">
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
                        <!--******************************-->
                        <!--******************************-->
                        <!--******************************-->
                        <!--begin::Pagination-->
                        {{ $articles->links() }}
                        <!--end::Pagination-->
                    </div>
                </div>
                <!--end::Column -->
                @endif
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
            </div>
            <!--end::Page Content-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        @include('Writer.Dashboard.partials.Footer')
        <!--end::Footer-->
    </div>
    <!--end::Page Wrapper-->
</div>
<!--end::Wrapper-->
<!-- ============================================================== -->
@endsection
