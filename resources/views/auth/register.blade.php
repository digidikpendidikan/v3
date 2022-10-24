@extends('layouts.app')

@section('title')
    <title>{{ env('APP_NAME') }} - Daftar</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Daftar Digidik bimbingan belajar online gratis untuk pelajar Indonesia.">
    <meta name="keywords" content="Daftar Digidik, Bimbel Online Gratis">
    <meta name="author" content="Digidik">
@endsection

@section('scriptStart')
    <link rel="stylesheet" href="{{ asset('plugins/custom/intl-tel-input/build/css/intlTelInput.css') }}">

    <style>
        .iti__flag {background-image: url("{{ asset('plugins/custom/intl-tel-input/build/img/flags.png') }}");}

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .iti__flag {background-image: url("{{ asset('plugins/custom/intl-tel-input/build/img/flags@2x.png') }}");}
        }
    </style>
@endsection

@section('heading')
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <h1 class="fs-1 fw-bolder">Daftar Digidik </h1>
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}" class="text-danger">Digidik</a>
            </li>
            <li class="breadcrumb-item">Daftar</li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 mb-6">
  
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row mb-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="username" class=" col-md-4 col-form-label text-md-right">Buat Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">No. Hp/WhatsApp</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" onkeypress='validate(event)' minlength="8" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Ketik Ulang Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" minlength="8" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
<hr>
        <div class="col-md-12 mt-6">
            <h2>Sudah Punya Akun?</h2>
            <p>Kalau sudah punya akun tinggal login ya, klik tombol di bawah ini.</p>
            <a href="{{ route('login') }}"><button class="btn btn-primary">
               Login Digidik
            </button></a>
        </div>
    </div>
@endsection

@section('scriptEnd')
    <script src="{{ asset('plugins/custom/intl-tel-input/build/js/intlTelInput.js') }}"></script>
    <script>

        function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
        // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
        }

        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
        initialCountry: "id",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "id";
            callback(countryCode);
            });
        },
        hiddenInput: "hp",
        utilsScript: "{{ asset('plugins/custom/intl-tel-input/build/js/utils.js?1638200991544') }}" // just for formatting/placeholders etc
        });
    </script>
@endsection