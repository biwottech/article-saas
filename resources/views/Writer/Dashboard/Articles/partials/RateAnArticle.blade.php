<!--begin::If this is not User Article-->
@if($article->user_id !== Auth::user()->id)
<!--begin::User Has Joined-->
@if(Student::hasJoined())
<!--begin::User Has Rated Already-->
@if(!($article = Student::RatedArticle($article->id)))
<!--begin::User Rating Limit-->
@if(Student::RatingLimit())
<div class="col flex-row d-flex  align-items-center justify-content-center">
    <div class="detials">
        <!-- Rating Stars Box -->
        <div class='rating-stars text-center'>
            <ul id='stars'>
                <li class='star' title='Poor' data-value='1'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Fair' data-value='2'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Good' data-value='3'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Excellent' data-value='4'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='WOW!!!' data-value='5'>
                    <i class='fa fa-star fa-fw'></i>
                </li>
            </ul>
        </div>
    </div>
</div>
@else
<div class="col flex-row d-flex  align-items-center justify-content-center">
    <div class="detials">
        <p>
            <span>
                <strong>You have Reached Your Maximum Rating Limit</strong>
            </span>
        </p>
    </div>
</div>
@endif
@else
<div class="col flex-row d-flex  align-items-center justify-content-center">
    <div class="detials">
        <p>
            <span>
                <strong>You have Rated {{ $article->rating }} Stars</strong>
            </span>
        </p>
    </div>
</div>
@endif
<!--end::User Has Rated Already-->
@endif
<!--end::User Has Joined-->
@endif
<!--end::If this is not User Article-->
