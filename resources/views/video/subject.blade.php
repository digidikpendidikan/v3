@extends('layouts.app')

@section('title')
    <title>Video {{$subject->nama}} {{$subject->group->nama}} - {{ env('APP_NAME') }}</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Bimbingan belajar online gratis untuk pelajar Indonesia. Vidio belajar gratis, tryout gratis, ">
    <meta name="keywords" content="Bimbingan Belajar, Bimbel Online, Bimbel Gratis">
    <meta name="author" content="Digidik">
@endsection

@section('scriptStart')
@endsection

@section('heading')
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <h1 class="fs-1 fw-bolder">Video {{$subject->nama}} {{$subject->group->nama}}</h1>
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}" class="text-danger">Digidik</a>
            </li>
			<li class="breadcrumb-item">
                <a href="{{route('video.index')}}" class="text-danger">Video Belajar</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('video.level',$subject->group->level->slug)}}" class="text-danger">{{ Str::upper($subject->group->level->slug)}}</a>
            </li>
            <li class="breadcrumb-item">{{$subject->nama}} {{$subject->group->nama}}</li>
        </ul>
    </div>
@endsection

@section('back')
href="{{route('video.level',$subject->group->level->slug)}}"
@endsection

@section('content')


@auth
<div class="alert alert-warning" role="alert">
	<b>Raih XP:</b> Like atau tandai video.
</div>
@endauth

<div class="card card-custom mb-6">
    <div class="card-body ribbon ribbon-top">
        <div class="ribbon-target bg-danger" style="top: -2px; right: 20px;">Pengajar</div>
        <div class="d-flex">
            <!--begin: Pic-->
            <div class="flex-shrink-0 me-7 mt-lg-0 mt-3">
                <div class="symbol symbol-50 symbol-lg-120">
                    <img src="{{asset('storage/'.$subject->fotopengajar)}}" alt="image" style="object-fit:cover"/>
                </div>
            </div>
            <!--end::Pic-->
            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between flex-wrap mt-1">
                    <div class="d-flex me-3">
                        <span class="text-dark me-3"><h3>{{$subject->pengajar}}</h3></span>
                    </div>
                </div>
                <!--end::Title-->
                <!--begin::Content-->
                <div class="d-flex flex-wrap justify-content-between mt-1">
                    <div class="d-flex flex-column flex-grow-1">
                        <div class="d-flex flex-wrap mb-4">
                            <span class="text-dark font-weight-bold me-lg-8 me-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\General\Shield-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>{{$subject->gelarpengajar}}</span>
                        </div>
                        <span class="font-weight-bold text-dark-50">{{$subject->deskripsi}}</span>
                    </div>
                    
                </div>
                <!--end::Content-->
            </div>
            <!--end::Info-->
        </div>
    </div>
</div>

@if($chapter->count()==0)
Mohon maaf, belum ada konten pada mata pelajaran ini.
@endif

@foreach($chapter->sortBy('prioritas') as $index=>$data)
<!--begin::Accordion-->
<div class="accordion accordion-solid accordion-toggle-plus cursor-pointer" id="accordionExample6">
    <div class="card mb-6" data-toggle="collapse" data-target="#collapseOne6">
        <div class="card-header" id="headingOne6">
            <div class="card-title text-dark" >
                
                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\General\Bookmark.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"/>
                    </g>
                </svg><!--end::Svg Icon--></span>
                <h2>Bab {{$index+1}} - {{$data->nama}}</h2>
            </div>
        </div>
        <div id="collapseOne6" class="collapse show" data-parent="#accordionExample6">
            <div class="card-body">
                <p>{{$data->deskripsi}}</p>
                @foreach($data->video->where('status','1')->sortBy('prioritas') as $data2)
                <!--begin::Item-->
                <a href="{{route('video.lesson',[$data2->chapter->subject->group->level->slug,$data2->chapter->subject->group->slug,$data2->chapter->subject->slug,$data2->chapter->slug,$data2->slug])}}" class="d-flex flex-wrap align-items-center mb-6 bg-light rounded p-2">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-50 flex-shrink-0 me-4">
                        <div class="symbol-label" style="background-image: url('{{asset('storage/'.$data2->icon)}}')"></div>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 me-2">
                        <h3 class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data2->nama}}</h3>
                        <span class="text-muted font-weight-bold">{{$data2->durasi}}</span>
                    </div>
                    <!--end::Title-->
                    <!--begin::Btn-->
                    <span class="btn btn-icon btn-light">
                        <span class="svg-icon svg-icon-success">
                            <span class="svg-icon svg-icon-md">
                                <img src="{{asset('media/icons/fast-forward.gif')}}" alt="" class="align-self-end" width="30px" height="30px" />
                            </span>
                        </span>
                    </span>
                    <!--end::Btn-->
                </a>
                <!--end::Item-->  
                @endforeach         
            </div>
        </div>
    </div>
</div>
<!--end::Accordion-->
@endforeach



@endsection

@section('scriptEnd')
@endsection