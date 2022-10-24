@extends('layouts.app')

@section('title')
    <title>Hasil Pencarian Video {{$kunci}} - {{ env('APP_NAME') }}</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Video belajar online gratis untuk pelajar Indonesia tanpa syarat dari Digidik Bimbel Online Gratis.">
    <meta name="keywords" content="Video belajar gratis, Bimbel Online, Bimbel Gratis">
    <meta name="author" content="Digidik">
@endsection

@section('scriptStart')
@endsection

@section('heading')
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <h1 class="fs-1 fw-bolder">Hasil Pencarian Video "{{$kunci}}"</h1>
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}" class="text-danger">Digidik</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('video.index')}}" class="text-danger">Video Belajar</a>
            </li>
            <li class="breadcrumb-item">Hasil Pencarian</li>
        </ul>
    </div>
@endsection

@section('back')
href="{{route('video.index')}}"
@endsection

@section('content')
@auth
<div class="alert alert-warning" role="alert">
	<b>Raih XP:</b> Like atau tandai video.
</div>
@endauth
{{-- <div class="alert alert-danger" role="alert">
	<b>Raih XP:</b> Ikuti tryout mandiri, nasional, atau quiz.
</div>

<div class="alert alert-danger" role="alert">
	<b>Raih XP:</b> Kirim pertanyaan atau jawab pertanyaan temanmu.
</div>

<div class="alert alert-danger" role="alert">
	<b>Raih XP:</b> Upload catatan belajarmu.
</div>

<div class="alert alert-danger" role="alert">
	<b>Raih XP:</b> Download buku elektronik
</div> --}}


<h2>Hasil Pencarian Video</h2>
@if($lesson->count()==0)
<p class="mb-6">Tidak ditemukan hasil di pencarian video.</p>
@else
<div id="collapseOne6" class="collapse show" data-parent="#accordionExample6">
    <div>
        @foreach($lesson as $data)
        <!--begin::Item-->
        <a href="{{route('video.lesson',[$data->chapter->subject->group->level->slug,$data->chapter->subject->group->slug,$data->chapter->subject->slug,$data->chapter->slug,$data->slug])}}" class="d-flex flex-wrap align-items-center mb-6 bg-white rounded p-2">
            <!--begin::Symbol-->
            <div class="symbol symbol-50 flex-shrink-0 me-4">
                <div class="symbol-label" style="background-image: url('{{asset('storage/'.$data->icon)}}')"></div>
            </div>
            <!--end::Symbol-->
            <!--begin::Title-->
            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 me-2">
                <h3 class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data->nama}}</h3>
                <span class="text-muted font-weight-bold">{{$data->chapter->subject->nama}} {{ Str::upper($data->chapter->subject->group->slug)}}- {{$data->durasi}}</span>
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
@endif

<h2>Hasil Pencarian Bab</h2>
@if($chapter->count()==0)
<p class="mb-6">Tidak ditemukan hasil di pencarian bab.</p>
@else
<div id="collapseOne6" class="collapse show" data-parent="#accordionExample6">
    <div>
        @foreach($chapter as $data2)
        <!--begin::Item-->
        @if($data2->video->first()!=null)
            <a href="{{route('video.navigation',[$data2->id,$data2->video->first()->prioritas])}}" class="d-flex flex-wrap align-items-center mb-6 bg-white rounded p-2">
        @else
            <a href="{{route('video.subject',[$data2->subject->group->level->slug,$data2->subject->group->slug,$data2->subject->slug])}}" class="d-flex flex-wrap align-items-center mb-6 bg-white rounded p-2">
        @endif
            <span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\General\Bookmark.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"/>
                </g>
            </svg><!--end::Svg Icon--></span>
            <!--begin::Title-->
            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 me-2">
                <h3 class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data2->nama}}</h3>
                <span class="text-muted font-weight-bold">{{$data2->subject->nama}} {{ Str::upper($data2->subject->group->slug)}}</span>
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
@endif

<h2>Hasil Pencarian Mapel</h2>
@if($subject->count()==0)
<p class="mb-6">Tidak ditemukan hasil di pencarian mapel.</p>
@else
<div id="collapseOne6" class="collapse show" data-parent="#accordionExample6">
    <div>
        @foreach($subject as $data3)
        <!--begin::Item-->
        <a href="{{route('video.subject',[$data3->group->level->slug,$data3->group->slug,$data3->slug])}}" class="d-flex flex-wrap align-items-center mb-6 bg-white rounded p-2">
            <!--begin::Symbol-->
            <div class="symbol symbol-50 flex-shrink-0 me-4">
                <div class="symbol-label" style="background-image: url('{{asset('storage/'.$data3->icon)}}')"></div>
            </div>
            <!--end::Symbol-->
            <!--begin::Title-->
            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 me-2">
                <h3 class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data3->nama}}</h3>
                <span class="text-muted font-weight-bold">{{$data3->group->nama}} - {{$data3->durasi}}</span>
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
@endif

<!--begin::Engage Widget 15-->
<div class="card card-custom gutter-b mb-6">
	<div class="card-body rounded p-0 d-flex bg-white">
		<div class="d-flex flex-column flex-lg-row-auto w-auto w-lg-350px w-xl-450px w-xxl-650px py-10 py-md-14 px-10 px-md-20 pr-lg-0">
			<h1 class="font-weight-bolder text-dark mb-0">Masih Belum Ketemu Videonya?</h1>
			<div class="font-size-h4 mb-8">Coba Cari Lagi Dengan Kata Kunci yang Berbeda</div>
			<!--begin::Form-->
			{!! Form::open(['route'=>'video.search', 'method'=>'get', 'files'=>false])!!}
			<div class="d-flex flex-center py-2 px-2 bg-light rounded">
				<span class="svg-icon svg-icon-primary px-3 svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\General\Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24"/>
						<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
						<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg><!--end::Svg Icon--></span>
				{!! Form::text('kunci',null,['class'=>$errors->has('kunci') ? 'form-control border-0 font-weight-bold pl-2 is-invalid' : 'form-control border-0 font-weight-bold pl-2', 'required' => 'required','placeholder'=>'Cari Video di Digidik'])!!}
				<button type="submit" class="btn btn-primary mx-2">
					Cari
				</button>
			</div>
			<!--end::Form-->
			{!! Form::close() !!}
		</div>
		<div class="d-none d-md-flex flex-row-fluid bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover" style="background-position: 0 calc(100% + 0.5rem); background-size: 100% auto; background-image: url({{asset('media/svg/patterns/rhone.svg')}});"></div>
	</div>
</div>


@endsection

@section('scriptEnd')
@endsection