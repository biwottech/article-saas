@if($relatedArticles->count() > 0)
<div class="card-footer bg-white">
    <h2>Stories You Might Like</h2>
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
                            <a href="{{ route('ReaderReadArticle',$related->id ) }}">
                                @if(Article::getFirstImage($related->id) !== "")
                                <img style="width: 100%; height: 100px;" class="card-img-top" src="{{ Article::getFirstImage($related->id) }}" alt="Card image cap">
                                @else
                                <img style="width: 100%; height: 100px;" class="card-img-top" src="{{ asset('Dashboard/assets/images/placeholder.png') }}" alt="Card image cap">
                                @endif
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="card-title font-weight-bold mb-0">{!! substr(strip_tags($related->title), 0, 10) . '...' !!}</h5>
                            <p class=" mb-0">{!! substr(strip_tags($related->content), 0, 30) . '...' !!}</p>
                            <div class="d-flex no-block align-items-center mb-3">
                                <span><i class="ti-calendar"></i> {{ date('d M Y',strtotime($article->created_at) ) }}</span>
                            </div>
                            <a href="{{ route('ReaderReadArticle',$related->id ) }}" class="btn btn-info btn-rounded waves-effect waves-light">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
