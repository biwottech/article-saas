<div class="col-12">
    <form method="POST" action="{{ route('AdminUpdatePlan',$plan->id) }}">
        @csrf
        <!--**************************************-->
        <!--**************************************-->
        <!--**************************************-->
        <div class="form-group row">
            <div class="col-sm-12 col-lg-4 col-md-4 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $plan->name }}" id="name" name="name" placeholder="Plan Name Here" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-sm-12 col-lg-4 col-md-4 mb-3">
                <label for="description">Description</label>
                <input type="description" class="form-control @error('description') is-invalid @enderror" value="{{ $plan->description }}" id="description" name="description" placeholder="Plan Description Here" required>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-sm-12 col-lg-4 col-md-4 mb-3">
                <label for="price">Plan Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $plan->price }}" id="price" name="price" placeholder="Plan Price Here" required>
                <small class="text-muted">
                    Enter 0 If you want to make this Plan Free.
                </small>
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <!--**************************************-->
        <!--**************************************-->
        <!--**************************************-->
        <div class="form-group row">
            <div class="col-sm-12 col-lg-3 col-md-3 mb-3">
                <label for="signup_fee">SignUp Fee</label>
                <input type="text" class="form-control @error('signup_fee') is-invalid @enderror" value="{{ $plan->signup_fee}}" id="signup_fee" name="signup_fee" placeholder="Plan SignUp Fee Here" required>
                <small class="text-muted">
                    Enter 0 If you want to make Free SignUp.
                </small>
                @error('signup_fee')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3 mb-3">
                <label for="trial_period">Trial Period</label>
                <select class="form-control @error('trial_period') is-invalid @enderror" name="trial_period">
                    @for($i=0;$i<91;$i++) <option value="{{ $i }}" {{$i == $plan->trial_period  ? 'selected' : ''}}>
                        {{ $i.__(' Days')}}
                        </option>
                        @endfor
                </select>
                <small class="text-muted">
                    If you want to give a Trial the Enter number of days e.g 1,2,3 Days.
                </small>
                @error('trial_period')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3 mb-3">
                <label for="grace_period">Subscription Period</label>
                <select class="form-control @error('grace_period') is-invalid @enderror" name="grace_period">
                    @for($i=1;$i<366;$i++) <option value="{{ $i }}" {{$i == $plan->grace_period  ? 'selected' : ''}}>
                        {{ $i.__(' Days')}}
                        </option>
                        @endfor
                </select>
                <small class="text-muted">
                    Default Subscription Period is Monthly and Yearly.
                </small>
                @error('grace_period')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3 mb-3">
                <label for="invoice_period">Invoice Period</label>
                <select class="form-control @error('invoice_period') is-invalid @enderror" name="invoice_period">
                    @for($i=1;$i<7;$i++) <option value="{{ $i }}" {{$i == $plan->invoice_period  ? 'selected' : ''}}>
                        {{ $i.__(' Month')}}
                        </option>
                        @endfor
                </select>
                <small class="text-muted">
                    Enter number of Months e.g 1,2,3 Months.
                </small>
                @error('invoice_period')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <!--**************************************-->
        <!--**************************************-->
        <!--**************************************-->
        <div class="form-group row">
            <div class="col">
                <button type="submit" class="btn btn-info btn-rounded">Save Changes</button>
            </div>
        </div>
    </form>
</div>
