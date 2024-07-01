<!-- The Modal -->
<div class="modal fade" id="UpdatePaypalAccount{{ $account->id}}Modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('UpdatePaypalAccount',$account->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="account_name">Account Name:</label>
                        <input type="text" name="account_name" value="{{ $account->account_name }}" class="form-control" placeholder="Enter Account Name" id="account_name">
                    </div>
                    <div class="form-group">
                        <label for="email">Account Email:</label>
                        <input type="email" value="{{ $account->email }}" name="account_email" class="form-control" placeholder="Enter Email" id="email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-rounded">Update Account</button>
                </form>
            </div>
        </div>
    </div>
</div>
