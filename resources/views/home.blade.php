@extends('layouts.app')

@section('title')
    <title>{{ env('APP_NAME') }} - Bimbel Online Gratis</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Bimbingan belajar online gratis untuk pelajar Indonesia. Vidio belajar gratis, tryout gratis, ">
    <meta name="keywords" content="Bimbingan Belajar, Bimbel Online, Bimbel Gratis">
    <meta name="author" content="Digidik">
@endsection

@section('scriptStart')
@endsection

@section('heading')
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <h1 class="fs-1 fw-bolder">Beranda</h1>
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}" class="text-danger">Digidik</a>
            </li>
            <li class="breadcrumb-item">Beranda</li>
        </ul>
    </div>
@endsection

@section('content')

<div class="row g-5 g-xl-8">
    <div class="col-xl-4">
        <!--begin::Statistics Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center pt-3 pb-0">
                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                    <h2><a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Grup Telegram</a></h2>
                    <span class="fw-bold text-muted fs-5">Ayo Gabung Grup untuk Dapatkan Info Program Terbaru</span>
                </div>
                <img src="{{asset('media/icons/telegram.png')}}" alt="" class="align-self-end h-100px" />
            </div>
            <div class="card-footer py-1 px-1">
                <a href="https://t.me/pelajardigidik" target="_blank" class="btn btn-danger w-100 d-flex justify-content-between align-items-center">
                    <span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
                    <span>Gabung Grup Telegram</span>
                    <span></span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Statistics Widget 2-->
    </div>
    <div class="col-xl-4">
        <!--begin::Statistics Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center pt-3 pb-0">
                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                    <h2><a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Video Belajar</a></h2>
                    <span class="fw-bold text-muted fs-5">Ayo Belajar Melalui Video Pembelajaran Gratis</span>
                </div>
                <img src="{{asset('media/icons/video-play.png')}}" alt="" class="align-self-end h-100px" />
            </div>
            <div class="card-footer py-1 px-1">
                <a href="{{route('video.index')}}" class="btn btn-danger w-100 d-flex justify-content-between align-items-center">
                    <span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
                    <span>Akses Video</span>
                    <span></span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Statistics Widget 2-->
    </div>
    <div class="col-xl-4">
        <!--begin::Statistics Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center pt-3 pb-0">
                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                    <h2><a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Tryout</a></h2>
                    <span class="fw-bold text-muted fs-5">Ayo Latih Kemampuanmu Mengerjakan Soal</span>
                </div>
                <img src="{{asset('media/icons/presentation.png')}}" alt="" class="align-self-end h-100px" />
            </div>
            <div class="card-footer py-1 px-1">
                <a href="#" class="btn btn-danger w-100 d-flex justify-content-between align-items-center">
                    <span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
                    <span>Dalam Proses Migrasi</span>
                    <span></span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Statistics Widget 2-->
    </div>
   
</div>
<div class="row g-5 g-xl-8">
    <div class="col-xl-4">
        <!--begin::Statistics Widget 2-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center pt-3 pb-0">
                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                    <h2><a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Bertanya</a></h2>
                    <span class="fw-bold text-muted fs-5">Ayo Tanya dan Jawab Soal Pelajaran Sekolah</span>
                </div>
                <img src="{{asset('media/icons/qa.png')}}" alt="" class="align-self-end h-100px" />
            </div>
            <div class="card-footer py-1 px-1">
                <a href="#" class="btn btn-danger w-100 d-flex justify-content-between align-items-center">
                    <span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
                    <span>Dalam Proses Migrasi</span>
                    <span></span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Statistics Widget 2-->
    </div>
    <div class="col-xl-4">
        <!--begin::Statistics Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center pt-3 pb-0">
                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                    <h2><a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Eksplorasi PTN</a></h2>
                    <span class="fw-bold text-muted fs-5">Ayo Eksplorasi Informasi PTN Indonesia</span>
                </div>
                <img src="{{asset('media/icons/graduation.png')}}" alt="" class="align-self-end h-100px" />
            </div>
            <!--end::Body-->
            <div class="card-footer py-1 px-1">
                <a href="#" class="btn btn-danger w-100 d-flex justify-content-between align-items-center">
                    <span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
                    <span>Dalam Proses Migrasi</span>
                    <span></span>
                </a>
            </div>
        </div>
        <!--end::Statistics Widget 2-->
    </div>
    <div class="col-xl-4">
        <!--begin::Statistics Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center pt-3 pb-0">
                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                    <h2><a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Eksplorasi Jurusan</a></h2>
                    <span class="fw-bold text-muted fs-5">Ayo Eksplorasi Berbagai Jurusan Kuliah</span>
                </div>
                <img src="{{asset('media/icons/education.png')}}" alt="" class="align-self-end h-100px" />
            </div>
            <!--end::Body-->
            <div class="card-footer py-1 px-1">
                <a href="#" class="btn btn-danger w-100 d-flex justify-content-between align-items-center">
                    <span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
                    <span>Dalam Proses Migrasi</span>
                    <span></span>
                </a>
            </div>
        </div>
        <!--end::Statistics Widget 2-->
    </div>
    
</div>
<div class="row g-5 g-xl-8">
    <div class="col-xl-4">
        <!--begin::Statistics Widget 2-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center pt-3 pb-0">
                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                    <h2><a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Buku Elektronik</a></h2>
                    <span class="fw-bold text-muted fs-5">Ayo Manfaatkan Koleksi BSE Terlengkap</span>
                </div>
                <img src="{{asset('media/icons/ebook.png')}}" alt="" class="align-self-end h-100px" />
            </div>
            <!--end::Body-->
            <div class="card-footer py-1 px-1">
                <a href="#" class="btn btn-danger w-100 d-flex justify-content-between align-items-center">
                    <span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
                    <span>Dalam Proses Migrasi</span>
                    <span></span>
                </a>
            </div>
        </div>
        <!--end::Statistics Widget 2-->
    </div>
    <div class="col-xl-4">
        <!--begin::Statistics Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center pt-3 pb-0">
                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                    <h2><a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">Blog</a></h2>
                    <span class="fw-bold text-muted fs-5">Ayo Baca Artikel Pendidikan Informatif</span>
                </div>
                <img src="{{asset('media/icons/publication.png')}}" alt="" class="align-self-end h-100px" />
            </div>
            <!--end::Body-->
            <div class="card-footer py-1 px-1">
                <a href="https://blog.digidik.id/" target="_blank" class="btn btn-danger w-100 d-flex justify-content-between align-items-center">
                    <span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
                    <span>Akses Blog</span>
                    <span></span>
                </a>
            </div>
        </div>
        
        <!--end::Statistics Widget 2-->
    </div>
</div>
@endsection

@section('scriptEnd')
 <script>
        var typed = new Typed("#typed_digidik", {
            strings: ["Bimbel Online Gratis", "Bimbel Online Terlengkap", "Bimbel Online Berkualitas"],
            typeSpeed: 60,
            loop:true
        });
    </script>
    <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ asset('js/custom/widgets.js') }}"></script>
        <script src="{{ asset('js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('js/custom/modals/create-app.js') }}"></script>
        <script src="{{ asset('js/custom/modals/upgrade-plan.js') }}"></script>
    <!--end::Page Custom Javascript-->
@endsection