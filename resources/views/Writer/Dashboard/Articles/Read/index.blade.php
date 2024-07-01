@extends('layouts.Master')
@section('header-scripts')
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/dist/css/Slider.css') }}">
@endsection
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h2>{{$article->title }}</h2>
                        </div>
                        <div class="card-body">
                            @if(!is_null($article->feature_image))
                            <img style="width: 100%;" class="mb-4" src="{{ asset('Articles/'.$article->feature_image) }}" alt="Card image cap">
                            @else
                            <img style="width: 100%;" class="mb-4" src="{{ asset('Dashboard/assets/images/placeholder.png') }}" alt="Card image cap">
                            @endif
                            {!! $article->content !!}
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-user"></i> Author</h4>
                            <a href=""></a>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('AdminArticleStatistics',$article->id) }}" class="btn btn-info btn-rounded waves-effect waves-light mt-3"><i class="fas fa-chart-line"></i> Data & Stats</a>
                            <a href="{{ route('AdminEditArticle',$article->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light mt-3"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                        <div class="card-body">
                            <hr>
                            <div class="navigation-top">
                                <div class="navigation-area">
                                    <div class="row">
                                        <div class="col-sm-12 d-flex">
                                            <div class="col-lg-4 col-md-4 col-12 flex-row d-flex justify-content-center align-items-center">
                                                <div class="detials">
                                                    <p><span><i class="ti-calendar"></i> &nbsp;{{ date('d-M-Y',strtotime($article->created_at)) }}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12 flex-row d-flex justify-content-center align-items-center">
                                                <div class="detials">
                                                    <div class="card d-inline">
                                                        @if($article->averageRating(1)[0] > 0)
                                                        <strong>Average Rating({{ $article->averageRating(2)[0] }})</strong>
                                                        @else
                                                        <strong>Average Rating(0)</strong>
                                                        @endif
                                                        {{--Start Rating--}}
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12 flex-row d-flex justify-content-center align-items-center">
                                                <div class="detials">
                                                    <p><span><i class="ti-eye"></i> &nbsp; {{Article::Views($article->id)}} Views</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @if(!is_null($relatedArticles))
                        <div class="card-footer bg-white">
                            <h2>Related Articles</h2>
                            <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 product-carousel" data-ride="carousel">
                                <!--Controls-->
                                <div class="controls-top my-3">
                                    <a class="btn-floating btn-sm" href="#carousel-example-multi" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                                    <a class="btn-floating btn-sm" href="#carousel-example-multi" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                                </div>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($relatedArticles as $related)
                                    <div class="carousel-item @if ($loop->first) active mx-auto @endif">
                                        <div class="col-sm-12 col-md-4 col-lg-2 mx-auto">
                                            <div class="card mb-2">
                                                <div class="view overlay">
                                                    <a href="{{ route('AdminReadArticle',$related->id) }}">
                                                        @if(!is_null($article->feature_image))
                                                        <img style="width: 100%; height: 100px;" class="card-img-top" src="{{ asset('Articles/'.$article->feature_image) }}" alt="Card image cap">
                                                        @else
                                                        <img style="width: 100%; height: 100px;" class="card-img-top" src="{{ asset('Dashboard/assets/images/placeholder.png') }}" alt="Card image cap">
                                                        @endif
                                                        <div class="mask rgba-white-slight"></div>
                                                    </a>
                                                </div>
                                                <div class="card-body p-3">
                                                    <h5 class="card-title font-weight-bold mb-0">{!! substr(strip_tags($related->title), 0, 10) . '...' !!}</h5>
                                                    <p class=" mb-0">{!! substr(strip_tags($related->content), 0, 30) . '...' !!}</p>
                                                    <ul class="list-unstyled list-inline my-2">
                                                        {{--Start Rating--}}
                                                        @for ($i = 0; $i < 5; $i++) @if (floor($related->averageRating()[0]) - $i >= 1)
                                                            {{--Full Start--}}
                                                            <i class="fas fa-star text-warning"> </i>
                                                            @elseif ($related->averageRating()[0] - $i > 0)
                                                            {{--Half Start--}}
                                                            <i class="fas fa-star-half-alt text-warning"> </i>
                                                            @else
                                                            {{--Empty Start--}}
                                                            <i class="far fa-star text-warning"> </i>
                                                            @endif
                                                            @endfor
                                                            {{--End Rating--}}
                                                    </ul>
                                                    <div class="d-flex no-block align-items-center mb-3">
                                                        <span><i class="ti-calendar"></i> {{ date('d M Y',strtotime($article->created_at) ) }}</span>
                                                    </div>
                                                    <a href="{{ route('AdminReadArticle',$related->id) }}" class="btn btn-info btn-rounded waves-effect waves-light">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
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
<div class="chat-windows"></div>
@section('footer-scripts')
<script type="text/javascript" src="{{ asset('Dashboard/dist/js/Slider.js') }}"></script>
@endsection
@endsection
