<!-- Modal -->
<div class="modal fade" id="UpdatePaypal{{$paypal->id}}Account" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Paypal Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('AdminUpdateStudentPaypalAccount',$paypal->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="account_name">Account Name:</label>
                        <input type="text" name="account_name" value="{{ $paypal->account_name }}" class="form-control" id="account_name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input value="{{ $paypal->email }}" type="email" name="account_email" class="form-control" id="account_email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-rounded">Update Account</button>
                </form>
            </div>
        </div>
    </div>
</div>
