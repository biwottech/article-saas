@if($article->user_id == Auth::user()->id)
<div class="col flex-row d-flex justify-content-center align-items-center">
    <div class="detials">
        <p><span><i class="ti-flag"></i> &nbsp; {{$article->reports }} Reports</span></p>
    </div>
</div>
@endif
