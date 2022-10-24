@extends('layouts.admin')

@section('title')
    <title>Beranda - Digidik</title>
@endsection

@section('scriptStart')
@endsection

@section('heading')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="fs-1 fw-bolder text-dark">Beranda Admin</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{route('admin.home')}}" class="text-muted">Digidik</a>
            </li>
            <li class="breadcrumb-item">Beranda Admin</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
@endsection

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

<div class="card-body">
    <h5>Selamat datang di halaman dashboard, <strong>{{Auth::guard('adminMiddle')->user()->name}}</strong></h5>
    <a href="{{ route('admin.logout') }}" class="btn btn-primary">Logout</a>
</div>



@endsection

@section('scriptEnd')
@endsection
</html>