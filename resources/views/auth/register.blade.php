@extends('layouts.AuthLayout')
@section('content')
<!--begin::Preloader-->
<!--end::Preloader-->
<!-- Register box.scss -->
<!-- ============================================================== -->
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('Dashboard/assets/images/big/auth-bg.jpg')}}) no-repeat center center;">
    <div class="auth-box register">
        <div>
            <div class="logo">
                <span class="db"><img src="{{ asset('Dashboard/assets/images/logo-icon.png')}}" alt="logo" /></span>
                <h5 class="font-medium mb-3">Sign Up</h5>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row ">
                            <div class="col-12 ">
                                <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-12 ">
                                <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-12 ">
                            <select name="role" class="form-control form-control-lg @error('role') is-invalid @enderror">
                                <option selected value="">
                                    Please Specify Your Role
                                </option>
                                <option value="teacher">
                                    Teacher
                                </option>
                                <option value="parent">
                                    Parent
                                </option>
                                <option  value="writer">
                                    Writer
                                </option>
                            </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-12 ">
                                <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" autofocus placeholder="{{ __('Password') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row ">
                            <div class="col-12 ">
                                <input class="form-control form-control-lg" type="password" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="{{ __('Confirm Password') }}">
                            </div>
                        </div>

                        <div class="form-group text-center ">
                            <div class="col-xs-12 pb-3 ">
                                <button class="btn btn-block btn-lg btn-info " type="submit ">SIGN UP</button>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-2 ">
                            <div class="col-sm-12 text-center ">
                                Already have an account? <a href="{{ route('login') }}" class="text-info ml-1"><b>Sign In</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('footer-scripts')
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>
$('[data-toggle="tooltip "]').tooltip();
$(".preloader ").fadeOut();
</script>
@endsection
@endsection