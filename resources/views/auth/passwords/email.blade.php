@extends('layouts.LandingPageLayout')
@section('content')
<!--begin::Navigation-->
@include('LandingPage.partials.Navigation')
<!--end::Navigation-->
<main class="login-body" style="background-image: url({{ asset('LandingPage/assets/img/hero/h1_hero.png') }});">
    <form class="form-default" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="login-form">
            <h2>Recover Password</h2>
            <div class="form-input">
                <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus aria-describedby="email">
                @error('email')
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="form-input pt-30">
                <button type="submit" class="btn btn-lg btn-block">{{ __('Send Password Reset Link') }}
                </button>
            </div>
            <a href="{{ route('JoinUs') }}" class="registration">Register</a>
            <a href="{{ route('login') }}" class="registration">Login here</a>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </form>
</main>
<!--begin::Footer-->
@include('LandingPage.partials.Footer')
<!--end::Footer-->
@endsection
