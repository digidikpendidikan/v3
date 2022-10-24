@extends('layouts.app')

@section('title')
    <title>{{ env('APP_NAME') }} - Login</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Login Digidik bimbingan belajar online gratis untuk pelajar Indonesia.">
    <meta name="keywords" content="Login Digidik, Bimbel Online Gratis">
    <meta name="author" content="Digidik">
@endsection

@section('scriptStart')
@endsection

@section('heading')
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <h1 class="fs-1 fw-bolder">Login Digidik </h1>
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}" class="text-danger">Digidik</a>
            </li>
            <li class="breadcrumb-item">Login</li>
        </ul>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Username/Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="usernamelogin" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('usernamelogin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="passwordlogin" class="form-control @error('password') is-invalid @enderror" name="passwordlogin" required autocomplete="current-password">

                                @error('passwordlogin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                       Tetap login
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                       Saya Lupa Password
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
