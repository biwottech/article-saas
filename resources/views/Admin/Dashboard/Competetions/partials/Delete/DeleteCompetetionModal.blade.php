<!-- The Modal -->
<div class="modal fade" id="Delete{{ $competetion->id }}Competetion">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body mt-4">
                <h4> <strong class="text-center"> Deleting this Competetion will delete all the data associated with this Competetion.Are you sure you want to delete the Competetion?
                    </strong></h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn waves-effect waves-light btn-rounded btn-info" data-dismiss="modal">No,don't Delete</button>
                <form method="post" class="d-inline" action="{{ route('AdminDeleteCompetetion',$competetion->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-danger">Yes,Delete Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
