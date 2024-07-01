<!--begin::If this is not User Article-->
@if($article->user_id !== Auth::user()->id)
<!--begin::User Has Joined-->
@if(Student::hasJoined())
<!-- Modal -->
<div class="modal fade" id="ReportArticle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">Report this Article</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="{{ route('WriterReportArticle',$article->id ) }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="report_message" class="control-label">Message (Optional):</label>
                        <textarea name="report_message" placeholder="Write a reason for Reporting this Article" class="form-control" id="report_message">{{ old('report_message') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->
@endif
<!--end::User Has Joined-->
@endif
<!--end::If this is not User Article-->
