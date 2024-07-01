<!--begin::If this is not User Article-->
@if($article->user_id !== Auth::user()->id)
<!--begin::User Has Joined-->
@if(Student::hasJoined())
<div class="col flex-row d-flex align-items-center justify-content-center">
    <div class="detials">
        <p>
            <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#ReportArticle"><i class="fas fa-flag"></i> Report</button>
        </p>
    </div>
</div>
<div class="col flex-row d-flex justify-content-center  align-items-center">
    <div class="detials">
        <p><span><i class="ti-flag"></i> &nbsp; {{Auth::user()->reports->count() }} Reports</span></p>
    </div>
</div>
@endif
<!--end::User Has Joined-->
@endif
<!--end::If this is not User Article-->
