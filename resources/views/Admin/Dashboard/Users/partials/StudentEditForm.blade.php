<form class="form-horizontal r-separator" method="post" action="{{ route('AdminUpdateStudent',$user->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <h4 class="card-title mt-2 pb-3">Basic Information</h4>
        <div class="form-group row pb-3">
            <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" id="name" name="name" placeholder="Your Name Here" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" id="email" name="email" placeholder="Your Email Here" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="email" class="col-sm-3 text-right control-label col-form-label">Profile Picture</label>
            <div class="col-sm-3 col-lg-3 col-md-3">
                <div class="imgUp">
                    @if(!is_null($user->user_image))
                    <div class="imagePreview" style="background-image: url({{ asset('Users/profile_pictures/'.$user->user_image)}});"></div>
                    @else
                    <div class="imagePreview"></div>
                    @endif
                    <i class="fas fa-trash-alt del text-danger" style="background: transparent;"></i>
                    <label class="btn btn-info custom">
                        Upload<input id="uploadFile" type="file" class="uploadFile img @error('profile_picture') is-invalid @enderror" value="Upload Photo" name="profile_picture" style="width: 0px;height: 0px;overflow: hidden;">
                        @error('profile_picture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" id="phone" name="phone" placeholder="Your Phone Here" required>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="date_of_birth" class="col-sm-3 text-right control-label col-form-label">Date Of Birth</label>
            <div class="col-sm-9">
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ $user->date_of_birth }}" id="date_of_birth" name="date_of_birth" placeholder="Your Date Of Birth Here" required>
                @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        @if(!is_null(Writer::age()))
        <div class="form-group row pb-3">
            <label for="date_of_birth" class="col-sm-3 text-right control-label col-form-label">Age Group</label>
            <div class="col-sm-9">
                <select name="age_group" class="form-control @error('age_group') is-invalid @enderror">
                    <option selected value="{{ $user->age_group}}">
                        {{ $user->age_group}}
                    </option>
                    @foreach(Writer::age() as $age)
                    <option value="{{ $age->groups }}">
                        {{ $age->groups }}
                    </option>
                    @endforeach
                </select>
                @error('age_group')
                <span class="invalid-feedback" age_group="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        @endif
        <div class="form-group row pb-3">
            <label for="address" class="col-sm-3 text-right control-label col-form-label">Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->address }}" id="address" name="address" placeholder="Your Address Here" required>
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="place_of_birth" class="col-sm-3 text-right control-label col-form-label">Place Of Birth</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ $user->place_of_birth }}" id="place_of_birth" name="place_of_birth" placeholder="Your Place Of Birth" required>
                @error('place_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="father_name" class="col-sm-3 text-right control-label col-form-label">Father Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('father_name') is-invalid @enderror" value="{{ $user->father_name }}" id="father_name" name="father_name" placeholder="Your Father Name Here" required>
                @error('father_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="mother_name" class="col-sm-3 text-right control-label col-form-label">Mother Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('mother_name') is-invalid @enderror" value="{{ $user->mother_name }}" id="mother_name" name="mother_name" placeholder="Your Mother Name Here" required>
                @error('mother_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-body">
        <h4 class="card-title mt-2 pb-3">School Information</h4>
        <div class="form-group row pb-3">
            <label for="school_name" class="col-sm-3 text-right control-label col-form-label">School Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('school_name') is-invalid @enderror" value="{{ $user->school_name }}" id="school_name" name="school_name" placeholder="Your School Name" required>
                @error('school_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="school_email" class="col-sm-3 text-right control-label col-form-label">School Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control @error('school_email') is-invalid @enderror" value="{{ $user->school_email }}" id="school_email" name="school_email" placeholder="Your School Email" required>
                @error('school_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="school_phone" class="col-sm-3 text-right control-label col-form-label">School Phone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('school_phone') is-invalid @enderror" value="{{ $user->school_phone }}" id="school_phone" name="school_phone" placeholder="Your School Phone" required>
                @error('school_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="school_address" class="col-sm-3 text-right control-label col-form-label">School Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('school_address') is-invalid @enderror" value="{{ $user->school_address }}" id="school_address" name="school_address" placeholder="Your School Address" required>
                @error('school_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="course" class="col-sm-3 text-right control-label col-form-label">Course Or Grade</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('course') is-invalid @enderror" value="{{ $user->course }}" id="course" name="course" placeholder="Your Course Or Grade" required>
                @error('course')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-body">
        <h4 class="card-title mt-2 pb-3">Favourite Educator Information</h4>
        <div class="form-group row pb-3">
            <label for="favourite_educator_name" class="col-sm-3 text-right control-label col-form-label">Educator Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('favourite_educator_name') is-invalid @enderror" value="{{ $user->favourite_educator_name }}" id="favourite_educator_name" name="favourite_educator_name" placeholder="Your Educator Name" required>
                @error('favourite_educator_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="favourite_educator_email" class="col-sm-3 text-right control-label col-form-label">Educator Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control @error('favourite_educator_email') is-invalid @enderror" value="{{ $user->favourite_educator_email }}" id="favourite_educator_email" name="favourite_educator_email" placeholder="Your Educator Email" required>
                @error('favourite_educator_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="favourite_educator_phone" class="col-sm-3 text-right control-label col-form-label">Educator Phone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('favourite_educator_phone') is-invalid @enderror" value="{{ $user->favourite_educator_phone }}" id="favourite_educator_phone" name="favourite_educator_phone" placeholder="Your Educator Phone" required>
                @error('favourite_educator_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="favourite_educator_address" class="col-sm-3 text-right control-label col-form-label">Educator Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('favourite_educator_address') is-invalid @enderror" value="{{ $user->favourite_educator_address }}" id="favourite_educator_address" name="favourite_educator_address" placeholder="Your Educator Address" required>
                @error('favourite_educator_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-body">
        <h4 class="card-title mt-2 pb-3">Favourite Institute Information</h4>
        <div class="form-group row pb-3">
            <label for="favourite_institute_name" class="col-sm-3 text-right control-label col-form-label">Institute Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('favourite_institute_name') is-invalid @enderror" value="{{ $user->favourite_institute_name }}" id="favourite_institute_name" name="favourite_institute_name" placeholder="Your Institute Name" required>
                @error('favourite_institute_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="favourite_institute_email" class="col-sm-3 text-right control-label col-form-label">Institute Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control @error('favourite_institute_email') is-invalid @enderror" value="{{ $user->favourite_institute_email }}" id="favourite_institute_email" name="favourite_institute_email" placeholder="Your Institute Email" required>
                @error('favourite_institute_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="favourite_institute_phone" class="col-sm-3 text-right control-label col-form-label">Institute Phone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('favourite_institute_phone') is-invalid @enderror" value="{{ $user->favourite_institute_phone }}" id="favourite_institute_phone" name="favourite_institute_phone" placeholder="Your Institute Phone" required>
                @error('favourite_institute_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="favourite_institute_address" class="col-sm-3 text-right control-label col-form-label">Institute Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('favourite_institute_address') is-invalid @enderror" value="{{ $user->favourite_institute_address }}" id="favourite_institute_address" name="favourite_institute_address" placeholder="Your Institute Address" required>
                @error('favourite_institute_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-body">
        <h4 class="card-title mt-2 pb-3">Security</h4>
        <div class="form-group row pb-3">
            <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Your Password Here">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row pb-3">
            <label for="password_confirmation" class="col-sm-3 text-right control-label col-form-label">Confirm Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Your Password">
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group mb-0 text-right">
            <button type="submit" class="btn btn-info waves-effect waves-light btn-rounded">Save Changes</button>
        </div>
    </div>
</form>
