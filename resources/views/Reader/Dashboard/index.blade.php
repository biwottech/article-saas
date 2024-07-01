@extends('layouts.Master')
@section('content')
<!--begin::Preloader-->
@include('Reader.Dashboard.partials.Preloader')
<!--end::Preloader-->
<!--begin::Page Wrapper-->
<div id="main-wrapper">
    <!--begin::Topbar header-->
    @include('Reader.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('Reader.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Topbar header-->
    @include('Reader.Dashboard.partials.TopbarHeader')
    <!--end::Topbar header-->
    <!--begin::LeftSidebar-->
    @include('Reader.Dashboard.partials.LeftSidebar')
    <!--end::LeftSidebar-->
    <!--begin::Page Wrapper-->
    <div class="page-wrapper">
        <!--begin::BreadCrumb-->
        @include('Reader.Dashboard.partials.BreadCrumb')
        <!--end::BreadCrumb-->
        <!--begin::Content-->
        <div class="container-fluid">
            <!--begin::Page Content-->
            <div class="row">
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="alert alert-info">
                        <div class="card bg-transparent mb-0">
                            <div class="card-body">
                                <h3 class="text-info"><i class="fa fa-newspaper"></i> Articles</h3><strong>Here you can Read Articles.</strong>
                                <br>
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
                                            <a class="dropdown-item" href="{{ route('ReaderDashboard',['page' => request('page') , 'status' => request('status') , 'visibility' => request('visibility')   ,'show' => 5]) }}"> 5 Results
                                            </a>
                                            @for($i=5;$i < 51; $i++) @if ($i % 10==0) <a class="dropdown-item" href="{{ route('ReaderDashboard',['page' => request('page') , 'status' => request('status') , 'visibility' => request('visibility')   ,'show' => $i]) }}">{{ $i }} Results
                                                </a>
                                                @endif
                                                @endfor
                                        </div>
                                    </li>
                                    <!-- Dropdown -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('ReaderDashboard') }}">
                                            Reset Filters
                                        </a>
                                    </li>
                                </ul>
                                <form class="form-inline my-2 my-lg-0" action="{{ route('ReaderDashboard') }}">
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
                                    <th style="text-align:center">View</th>
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
                                            {{ Article::Views($article->id)}} Views
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
                                        <span class="badge badge-primary p-1">
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
                                        <a class="btn btn-info btn-sm btn-rounded text-inverse" type="submit" href="{{ route('ReaderReadArticle',$article->id) }}" title="" data-toggle="tooltip" data-original-title="View"><i class="fas fa-newspaper"></i></a>
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
        @include('Reader.Dashboard.partials.Footer')
        <!--end::Footer-->
    </div>
    <!--end::Page Wrapper-->
</div>
<!--end::Wrapper-->
<!-- ============================================================== -->
@endsection
