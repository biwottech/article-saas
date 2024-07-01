<!-- The Modal -->
<div class="modal fade" id="AddPaypalAccountModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('AddPaypalAccount') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="account_name">Account Name:</label>
                        <input type="text" name="account_name" value="{{ old('account_name') }}" class="form-control" placeholder="Enter Account Name" id="account_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Account Email:</label>
                        <input type="email" value="{{ old('account_email') }}" name="account_email" class="form-control" placeholder="Enter Email" id="email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-rounded">Add Account</button>
                </form>
            </div>
        </div>
    </div>
</div>
