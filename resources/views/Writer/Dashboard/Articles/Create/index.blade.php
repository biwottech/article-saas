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
                <!--begin::Alert-->
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <!-- Alert with content -->
                    <div class="alert alert-info">
                        <div class="card bg-transparent mb-0">
                            <div class="card-body">
                                <h3 class="text-info"><i class="fa fa-edit"></i> Write Article</h3>
                                <br>
                                <!--begin::Dashboard Button-->
                                <a href="{{ route('WriterDashboard') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-1"> <i class="fas fa-long-arrow-alt-left"></i> Go to Dashboard</a>
                                <!--end::Dashboard Button-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--******************************-->
                                <!--begin::Go To Articles Button-->
                                <a href="{{ route('WriterArticles') }}" class="btn waves-effect waves-light btn-rounded btn-info mt-1"> <i class="fas fa-long-arrow-alt-left"></i> Go to Articles</a>
                                <!--end::Go To Articles Button-->
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
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <input type="text" placeholder="Add a Title" value="{{ old('title') }}" name="title" class="form-control form-control-lg mb-3 @error('title') is-invalid @enderror">
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
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input @error('featured-image') is-invalid @enderror" id="customFile" name="featured-image">
                            @error('featured-image')
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
                            <label class="custom-file-label" for="customFile">Choose Feature Image</label>
                        </div>
                        <textarea id="summernote" name="content" placeholder="Add some Content" class="summernote @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
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
                        <button type="submit" formaction="{{ route('WriterSavePublish') }}" class="btn btn-info btn-rounded"><i class="fa fa-check"></i> Save & Publish</button>
                        <button type="submit" formaction="{{ route('WriterSaveArchive') }}" class="btn btn-primary btn-rounded"><i class="fa fa-archive"></i> Save & Archive</button>
                    </div>
                    <!--end::Article Title & Content-->
                    <!--******************************-->
                    <!--******************************-->
                    <!--******************************-->
                </div>
                <!--end::Article-->
            </form>
            <!--begin::Footer-->
            @include('Writer.Dashboard.partials.Footer')
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

    $(document).ready(function() {
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

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });

    </script>
    @endsection
    @endsection
