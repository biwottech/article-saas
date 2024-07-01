<form action="{{ route('SaveAsViewOnly') }}" class="form-default" method="POST">
    <div class="login-form register-form">
        <h2>Register Here</h2>
        <div class="row pt-3 d-flex">
            @csrf
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus="name" placeholder="{{ __('Your Name') }}">
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus="email" placeholder="{{ __('Your Email') }}">
                    @error('email')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus="phone" placeholder="{{ __('Your Phone') }}">
                    @error('phone')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('address') is-invalid @enderror" type="text" name="address" required autocomplete="address" autofocus="address" placeholder="{{ __('Your Address') }}" value="{{ old('address') }}">
                    @error('address')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('school_name') is-invalid @enderror" type="text" name="school_name" value="{{ old('school_name') }}" required autocomplete="school_name" autofocus="school_name" placeholder="{{ __('School You Instruct') }}">
                    @error('school_name')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('school_address') is-invalid @enderror" type="text" value="{{ old('school_address') }}" name="school_address" required autocomplete="school_address" autofocus="school_address" placeholder="{{ __('Your School Address') }}">
                    @error('school_address')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('course') is-invalid @enderror" type="text" name="course" value="{{ old('course') }}" required autocomplete="course" autofocus="course" placeholder="{{ __('Course You Instruct') }}">
                    @error('course')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" autofocus placeholder="{{ __('Password') }}">
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input type="password" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="{{ __('Confirm Password') }}">
                </div>
            </div>
        </div>
        <div class="form-input pt-30">
            <button type="submit" class="btn btn-lg btn-block">Register</button>
        </div>
        <a href="{{ route('login') }}" class="registration text-center">Already have an Account ? login</a>
    </div>
</form>
