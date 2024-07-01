<form action="{{ route('SaveAsStudent') }}" class="form-default" method="POST">
    @csrf
    <div class="login-form student-register-form">
        <h2>Register Here</h2>
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="row pt-3 d-flex">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus="name" placeholder="{{ __('Your Name') }}">
                    @error('name')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus="email" placeholder="{{ __('Your Email') }}">
                    @error('email')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus="phone" placeholder="{{ __('Your Phone') }}">
                    @error('phone')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-input">
                    <input class="@error('date_of_birth') is-invalid @enderror" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus="date_of_birth" placeholder="{{ __('Your Date Of Birth') }}">
                    @error('date_of_birth')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-input">
                    <input class=" @error('address') is-invalid @enderror" type="text" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus="address" placeholder="{{ __('Your Address') }}">
                    @error('address')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('mother_name') is-invalid @enderror" type="text" name="mother_name" value="{{ old('mother_name') }}" required autocomplete="mother_name" autofocus="mother_name" placeholder="{{ __('Your Mother Name') }}">
                    @error('mother_name')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('father_name') is-invalid @enderror" type="text" name="father_name" value="{{ old('father_name') }}" required autocomplete="father_name" autofocus="father_name" placeholder="{{ __('Your Father Name') }}">
                    @error('father_name')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <select name="parents_consent" class="@error('parents_consent') is-invalid @enderror">
                        <option selected value="">
                            Parents Consent
                        </option>
                        <option value="yes">
                            Yes
                        </option>
                        <option value="no">
                            No
                        </option>
                    </select>
                    @error('parents_consent')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('school_name') is-invalid @enderror" type="text" name="school_name" value="{{ old('school_name') }}" required autocomplete="school_name" autofocus="school_name" placeholder="{{ __('Your School Name') }}">
                    @error('school_name')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('school_phone') is-invalid @enderror" type="text" name="school_phone" value="{{ old('school_phone') }}" required autocomplete="school_phone" autofocus="school_phone" placeholder="{{ __('Your School Phone') }}">
                    @error('school_phone')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('school_email') is-invalid @enderror" type="email" name="school_email" value="{{ old('school_email') }}" required autocomplete="school_email" autofocus="school_email" placeholder="{{ __('Your School Email') }}">
                    @error('school_email')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class="@error('school_address') is-invalid @enderror" type="text" name="school_address" required autocomplete="school_address" autofocus="school_address" value="{{ old('school_address') }}" placeholder="{{ __('Your School Address') }}">
                    @error('school_address')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('course') is-invalid @enderror" type="text" name="course" value="{{ old('course') }}" required autocomplete="course" autofocus placeholder="{{ __('Your Course Or Grade') }}">
                    @error('course')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('favourite_educator_name') is-invalid @enderror" type="text" name="favourite_educator_name" value="{{ old('favourite_educator_name') }}" required autocomplete="favourite_educator_name" autofocus placeholder="{{ __('Your Favourite Educator Name') }}">
                    @error('favourite_educator_name')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('favourite_educator_phone') is-invalid @enderror" type="text" name="favourite_educator_phone" value="{{ old('favourite_educator_phone') }}" required autocomplete="favourite_educator_phone" autofocus placeholder="{{ __('Your Favourite Educator Phone') }}">
                    @error('favourite_educator_phone')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('favourite_educator_email') is-invalid @enderror" type="email" name="favourite_educator_email" value="{{ old('favourite_educator_email') }}" required autocomplete="favourite_educator_email" autofocus placeholder="{{ __('Your Favourite Educator Email') }}">
                    @error('favourite_educator_email')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class="@error('favourite_educator_address') is-invalid @enderror" type="text" name="favourite_educator_address" required autocomplete="favourite_educator_address" autofocus="favourite_educator_address" value="{{ old('favourite_educator_address') }}" placeholder="{{ __('Your Favourite Educator Address') }}">
                    @error('favourite_educator_address')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('favourite_institute_name') is-invalid @enderror" type="text" name="favourite_institute_name" value="{{ old('favourite_institute_name') }}" required autocomplete="favourite_institute_name" autofocus placeholder="{{ __('Your Favourite Institute Name') }}">
                    @error('favourite_institute_name')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('favourite_institute_phone') is-invalid @enderror" type="text" name="favourite_institute_phone" value="{{ old('favourite_institute_phone') }}" required autocomplete="favourite_institute_phone" autofocus placeholder="{{ __('Your Favourite Institute Phone') }}">
                    @error('favourite_institute_phone')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('favourite_institute_email') is-invalid @enderror" type="email" name="favourite_institute_email" value="{{ old('favourite_institute_email') }}" required autocomplete="favourite_institute_email" autofocus placeholder="{{ __('Your Favourite Institute Email') }}">
                    @error('favourite_institute_email')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('favourite_institute_address') is-invalid @enderror" type="text" name="favourite_institute_address" required autocomplete="address" autofocus="address" value="{{ old('favourite_institute_address') }}" placeholder="{{ __('Your Favourite Institute Address') }}">
                    @error('favourite_institute_address')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class=" @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" autofocus placeholder="{{ __('Password') }}">
                    @error('password')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-input">
                    <input class="" type="password" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="{{ __('Confirm Password') }}">
                </div>
            </div>
        </div>
        <div class="form-input pt-30">
            <button type="submit" class="btn btn-lg btn-block">Register</button>
        </div>
        <a href="{{ route('login') }}" class="registration text-center">Already have an Account ? login</a>
    </div>
</form>
