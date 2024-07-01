<!-- The Modal -->
<div class="modal fade" id="EndCompetetion">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">End Competetion</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h4> <strong class="text-center"> Are you sure you want to End the Competetion?
                    </strong></h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" data-dismiss="modal">No,don't End</button>
                <form method="post" class="d-inline" action="{{ route('AdminEndCompetetion',Competetion::IsActive()->id) }}">
                    @csrf
                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-info">Yes,End Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
