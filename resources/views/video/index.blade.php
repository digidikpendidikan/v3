@extends('layouts.app')

@section('title')
    <title>Video Belajar Gratis - {{ env('APP_NAME') }}</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Video belajar online gratis untuk pelajar Indonesia tanpa syarat dari Digidik Bimbel Online Gratis.">
    <meta name="keywords" content="Video belajar gratis, Bimbel Online, Bimbel Gratis">
    <meta name="author" content="Digidik">
@endsection

@section('scriptStart')
@endsection

@section('heading')
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <h1 class="fs-1 fw-bolder">Video Belajar Gratis</h1>
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}" class="text-danger">Digidik</a>
            </li>
            <li class="breadcrumb-item">Video Belajar</li>
        </ul>
    </div>
@endsection

@section('back')
href="{{route('home')}}"
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

<!--begin::Engage Widget 15-->
<div class="card card-custom gutter-b mb-6">
	<div class="card-body rounded p-0 d-flex bg-white">
		<div class="d-flex flex-column flex-lg-row-auto w-auto w-lg-350px w-xl-450px w-xxl-650px py-10 py-md-14 px-10 px-md-20 pr-lg-0">
			<h1 class="font-weight-bolder text-dark mb-0">Digidik Pelopor Bimbel Online Gratis</h1>
			<div class="font-size-h4 mb-8">Dapatkan Video Belajar Gratis Di Sini</div>
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

<div class="row">

	@foreach($level as $data)
	<div class="col-xl-6 mb-6">
		<!--begin::Engage Widget 11-->
		<div class="card card-custom card-stretch gutter-b">
			<div class="card-body d-flex p-0">
				<div class="flex-grow-1 p-20 pb-40 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: 50% auto; background-image: url({{asset('/media/svg/humans/custom-10.svg')}})">
					<h2 class="text-dark pb-5 font-weight-bolder">{{$data->nama}}</h2>
					<p class="text-dark-50 pb-5 font-size-h5">{{$data->deskripsi}}</p>
					<a href="{{route('video.level',$data->slug)}}" class="btn btn-danger d-flex justify-content-between align-items-center">
						<span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
							<span>Akses Video</span>
						<span></span>
					</a>
				</div>
			</div>
		</div>
		<!--end::Engage Widget 11-->
	</div>
	@endforeach
</div>

@endsection

@section('scriptEnd')
@endsection