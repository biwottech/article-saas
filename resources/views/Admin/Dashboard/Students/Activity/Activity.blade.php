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
                <!-- Column -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="profile-pic mb-3 mt-3">
                                <img src="{{ asset('Dashboard/assets/images/users/5.jpg') }}" width="150" class="rounded-circle" alt="user" />
                                <h4 class="mt-3 mb-0">{{ UserHelper::Info($user->id)->name }}</h4>
                                <a href="mailto:danielkristeen@gmail.com">{{ UserHelper::Info($user->id)->email }}</a>
                            </div>
                            <div class="badge badge-pill badge-light font-16">Dashboard</div>
                            <div class="badge badge-pill badge-light font-16">UI</div>
                            <div class="badge badge-pill badge-light font-16">UX</div>
                            <div class="badge badge-pill badge-info font-16" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                        </div>
                        <div class="p-25 border-top mt-3">
                            <div class="row text-center">
                                <div class="col-6 border-right">
                                    <a href="#" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-message font-20 mr-1"></i>Message</a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-developer-board font-20 mr-1"></i>Portfolio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recently Viewed Articles</h4>
                            <div class="profiletimeline">
                                <!--begin::Items-->
                                @foreach(Student::ViewedArticles($user->id) as $article)
                                <div class="sl-item">
                                    <div class="sl-right">
                                        <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <div class="mt-3 row">
                                                <div class="col-md-3 col-12"><img src="{{ asset('Dashboard/assets/images/big/img1.jpg') }}" alt="user" class="img-fluid" /></div>
                                                <div class="col-md-9 col-12">
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p>
                                                    <a href="{{ route('AdminReadArticle',$article->id ) }}" class="btn btn-primary btn-rounded waves-effect waves-light mt-3">View</a>
                                                </div>
                                            </div>
                                            <div class="like-comm mt-3"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--end::Items-->
                            </div>
                        </div>
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
@endsection
