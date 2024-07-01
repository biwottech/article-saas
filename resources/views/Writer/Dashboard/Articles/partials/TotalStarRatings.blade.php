<div class="col flex-row d-flex justify-content-center align-items-center">
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
