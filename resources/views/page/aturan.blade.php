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

@endsection
