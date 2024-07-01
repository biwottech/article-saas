@extends('layouts.LandingPageLayout')
@section('content')
<!--begin::Navigation-->
@include('LandingPage.partials.Navigation')
<!--end::Navigation-->
<main class="login-body" style="background-image: url({{ asset('LandingPage/assets/img/hero/h1_hero.png') }});">
    <form class="form-default" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="login-form">
            <h2>Login Here</h2>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <div class="form-input">
                <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus aria-describedby="email">
                @error('email')
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="form-input">
                <input type="password" class="@error('password') is-invalid @enderror" placeholder="Password" required name="password" autocomplete="current-password" aria-label="Password" aria-describedby="password">
                @error('password')
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="form-input pt-30">
                <button type="submit" class="btn btn-lg btn-block">Login</button>
            </div>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forget">Forget Password</a>
            @endif
            <a href="{{ route('JoinUs') }}" class="registration">Registration</a>
        </div>
    </form>
</main>
<!--begin::Footer-->
@include('LandingPage.partials.Footer')
<!--end::Footer-->
@endsection
