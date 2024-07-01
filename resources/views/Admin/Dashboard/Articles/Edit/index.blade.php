@extends('layouts.Master')
@section('header-scripts')
<!-- This Page CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/libs/summernote/dist/summernote-bs4.css')}}">
<style type="text/css">
input[type="file"] {
    display: block;
}

.imageThumb {
    width: 100%;
    border: 1px solid;
    padding: 1px;
    cursor: pointer;
}

.pip {
    display: inline-block;
    margin: 10px 0px 0 0;
}

.remove {
    display: block;
    color: #fff;
    background-color: #f62d51;
    border: 1px solid #f62d51;
    text-align: center;
    cursor: pointer;
}

.upload {
    display: block;
    background-color: #2962FF;
    border: 1px solid #2962FF;
    color: #fff;
    text-align: center;
    cursor: pointer;
}

.upload:hover {
    color: #fff;
    background-color: #0346ff;
    border-color: #0041f5;
}

.remove:hover {
    color: #fff;
    background-color: #f20a34;
    border-color: #e60a31;
}

</style>
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
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
                <!--begin::Alert-->
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="alert  @if(Article::IsBanned($article->id)) alert-danger @else alert-info @endif   text-center">
                        <div class="card bg-transparent">
                            <div class="card-header bg-transparent">
                                <h3>Article Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex">
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="fas fa-pencil-alt fa-2x"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Created
                                            <strong>
                                                {{ date('d-M-Y',strtotime($article->created_at)) }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <div class="col">
                                        <h3><i class="far fa-edit fa-2x"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Updated
                                            <strong>
                                                {{ date('d-M-Y',strtotime($article->updated_at)) }}
                                            </strong>
                                        </h4>
                                    </div>
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    @if(Article::IsBanned($article->id))
                                    <div class="col">
                                        <h3><i class="fa-2x fa fa-ban"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Status
                                            <strong>
                                                {{ __('BANNED') }}
                                            </strong>
                                        </h4>
                                    </div>
                                    @else
                                    <div class="col">
                                        <h3><i class="fa-2x fa fa-check"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Status
                                            <strong>
                                                {{ __('ACTIVE') }}
                                            </strong>
                                        </h4>
                                    </div>
                                    @endif
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    @if(Article::IsPublished($article->id))
                                    <div class="col">
                                        <h3><i class="fa-2x fa fa-paper-plane"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Visibility
                                            <strong>
                                                {{ __('PUBLISHED') }}
                                            </strong>
                                        </h4>
                                    </div>
                                    @else
                                    <div class="col">
                                        <h3><i class="fa-2x fa fa-archive"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Visibility
                                            <strong>
                                                {{ __('ARCHIVED') }}
                                            </strong>
                                        </h4>
                                    </div>
                                    @endif
                                    <div class="col">
                                        <h3><i class="fa-2x fa fa-eye"></i>
                                        </h3>
                                        <h4 class="card-title mt-4">
                                            Views
                                            <strong>
                                                {{ Article::Views($article->id) }}
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
                                <form method="post">
                                    @csrf
                                    <!--begin::Dashboard Button-->
                                    <a href="{{ route('AdminDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-2"> <i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                    <!--end::Dashboard Button-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--begin::Ban & UnBan Button-->
                                    @if(Article::IsBanned($article->id))
                                    <button type="submit" formaction="{{ route('AdminUnBanAnArticle',$article->id) }}" class="btn btn-success btn-rounded waves-effect waves-light mt-2" title="" data-toggle="tooltip" data-original-title="Un-Ban Now"><i class="fas fa-ban"></i> Un Ban Now</button>
                                    @else
                                    <button type="submit" formaction="{{ route('AdminBanAnArticle',$article->id) }}" class="btn btn-danger btn-rounded waves-effect waves-light mt-2" title="" data-toggle="tooltip" data-original-title="Ban Now"><i class="fas fa-check"></i> Ban Now</button>
                                    @endif
                                    <!--end::Ban & UnBan Button-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--begin::Archive & Publish Button-->
                                    @if(Article::IsPublished($article->id))
                                    <button type="submit" formaction="{{ route('AdminArchiveAnArticle',$article->id) }}" class="btn btn-danger btn-rounded waves-effect waves-light mt-2" title="" data-toggle="tooltip" data-original-title="Archive Now"><i class="fas fa-archive"></i> Archive Now</button>
                                    @else
                                    <button type="submit" formaction="{{ route('AdminPublishAnArticle',$article->id) }}" class="btn btn-success btn-rounded waves-effect waves-light mt-2" title="" data-toggle="tooltip" data-original-title="Publish Now"><i class="fas fa-paper-plane"></i> Publish Now</button>
                                    @endif
                                    <!--end::Archive & Publish Button-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--begin::Go To Articles Button-->
                                    <a href="{{ route('AdminReadArticle',$article->id) }}" class="btn waves-effect waves-light btn-rounded btn-primary mt-2"> <i class="fas fa-newspaper"></i> Read Article</a>
                                    <!--end::Go To Articles Button-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--******************************-->
                                    <!--begin::Go To Articles Button-->
                                    <a href="{{ route('AdminArticles') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-2"> <i class="fas fa-long-arrow-alt-left"></i> Go to Articles</a>
                                    <!--end::Go To Articles Button-->
                                </form>
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Alert-->
                <!--******************************-->
                <!--******************************-->
                <!--******************************-->
            </div>
            <!--end::Alert Row-->
            <form method="post" enctype="multipart/form-data">
                @csrf
                <!--begin::Article-->
                <div class="row">
                    <!--begin::Article Title & Content-->
                    <div class="col-sm-12 col-lg-9 col-md-9">
                        <input type="text" placeholder="Add a Title" value="{{$article->title}}" name="title" class="form-control form-control-lg mb-3 @error('card-title') is-invalid @enderror">
                        @error('title')
                        <script type="text/javascript">
                        $(document).ready(function() {
                            toastr.error('{{ $message }}', 'Error!', {
                                "showMethod": "slideDown",
                                "hideMethod": "slideUp",
                                timeOut: 2000
                            });
                        });

                        </script>
                        @enderror
                        <textarea id="summernote" name="content" placeholder="Add some Content" class="summernote @error('content') is-invalid @enderror">{{ $article->content}}</textarea>
                        @error('content')
                        <script type="text/javascript">
                        $(document).ready(function() {
                            toastr.error('{{ $message }}', 'Error!', {
                                "showMethod": "slideDown",
                                "hideMethod": "slideUp",
                                timeOut: 2000
                            });
                        });

                        </script>
                        @enderror
                        <button type="submit" formaction="{{ route('AdminUpdateArticle',$article->id) }}" class="btn btn-info btn-rounded"><i class="fa fa-check"></i> Save Changes</button>
                    </div>
                    <!--end::Article Title & Content-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--begin::Article Feature Image-->
                    <div class="col-sm-12 col-lg-3 col-md-3">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="field" align="left">
                                    <h3>Featured image</h3>
                                    <input type="file" value="{{ $article->feature_image}}" id="files" name="files" />
                                    @if(!is_null($article->feature_image))
                                    <span class="pip old-image">
                                        <img class="imageThumb" src="{{ asset('Articles/'.$article->feature_image) }}" title="" />
                                        <br />
                                        <span class="remove">Remove image</span>
                                    </span>
                                    @else
                                    <span class="pip old-image">
                                        <img class="imageThumb" src="{{ asset('Dashboard/assets/images/placeholder.png') }}" title="" />
                                        <br />
                                        <span class="remove">Remove image</span>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Article Feature Image-->
                </div>
                <!--end::Article-->
            </form>
            <!--begin::Footer-->
            @include('Admin.Dashboard.partials.Footer')
            <!--end::Footer-->
        </div>
        <!--end::Page Wrapper-->
    </div>
    <!--end::Wrapper-->
    <div class="chat-windows"></div>
    @section('footer-scripts')
    <!-- This Page JS -->
    <script src="{{ asset('Dashboard/assets/libs/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script type="text/javascript">
    /************************************/
    //default editor
    /************************************/
    $('#summernote').summernote({
        spellCheck: true,
        codeviewFilter: false,
        codeviewIframeFilter: true,
        codemirror: { // codemirror options
            mode: 'text/html',
            htmlMode: true,
            lineNumbers: true,
            theme: 'monokai'
        },
        placeholder: 'Start by Writing  Your Content here...',
        toolbar: [
            ['style', ['style']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen']],
            ['height', ['height']]
        ],
        height: 350,
        minHeight: null,
        maxHeight: null,
        focus: false
    });

    $(document).ready(function() {

        $('#files').value = "abc.jpg";

        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {

                        $(".old-image").remove();

                        $(".pip").remove();

                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">Remove image</span>" + "<span class=\"upload\">Upload image</span>" +
                            "</span>").insertAfter("#files");

                        $(".remove").click(function() {
                            $('#files').val('');
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }

        $(".remove").click(function() {
            $(this).parent(".pip").remove();
            $('#files').val('');
        });
    });

    </script>
    @endsection
    @endsection
