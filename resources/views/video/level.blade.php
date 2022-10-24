@extends('layouts.app')

@section('title')
    <title>Video {{$level->nama}} Gratis - {{ env('APP_NAME') }}</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Video belajar online {{$level->nama}} gratis tanpa syarat dari Digidik Bimbel Online Gratis.">
    <meta name="keywords" content="Bimbel {{$level->nama}}, Bimbel Online, Bimbel Gratis">
    <meta name="author" content="Digidik">
@endsection

@section('scriptStart')
@endsection

@section('heading')
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <h1 class="fs-1 fw-bolder">Video {{$level->nama}} Gratis</h1>
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}" class="text-danger">Digidik</a>
            </li>
			<li class="breadcrumb-item">
                <a href="{{route('video.index')}}" class="text-danger">Video Belajar</a>
            </li>
            <li class="breadcrumb-item">{{$level->nama}}</li>
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

@if($group->count() == 0)
Mohon maaf, belum ada konten pada jenjang ini.
@endif

<ul class="nav nav-tabs nav-tabs-line justify-content-center">
	@foreach($group as $index=>$data)
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_{{$index+1}}" id="kelas{{$index+1}}" style="font-size: 18px">{{$data->nama}}</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2" style="font-size: 18px">Kelas XI</a>
    </li>
	<li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3" style="font-size: 18px">Kelas XII</a>
    </li> --}}
	@endforeach
</ul>


<div class="tab-content mt-5" id="myTabContent">

	@foreach($group as $index=>$data)

	<div class="tab-pane fade" id="kt_tab_pane_{{$index+1}}" role="tabpanel" aria-labelledby="kt_tab_pane_2">
		
		<div class="row">
			@foreach($data->subject as $index=>$data2)
			@if ($data2->status == '0')
				@continue
			@endif
			<div class="col-md-4 col-lg-4 col-xxl-3 col-sm-4 col-6 ">
				<div class="card card-custom gutter-b card-stretch mb-5">
					<div class="card-body d-flex flex-column rounded bg-white justify-content-between ribbon ribbon-top">
						<div class="ribbon-target bg-primary" style="top: -2px; right: 20px;">{{$data2->kategori}}</div>
						<div class="text-center rounded mb-7">
							<img src="{{asset('storage/'.$data2->icon)}}" class="mw-100 w-100px" />
						</div>
						<div class="text-center">
							<h4 class="font-size-h5">
								<h2 class="text-dark-75 font-weight-bolder">{{$data2->nama}}</h2>
							</h4>
							<div class="font-size-h6 text-muted font-weight-bolder"> <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\General\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24"/>
									<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
									<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
								</g>
							</svg><!--end::Svg Icon--></span> <span class="text-dark">{{$data2->pengajar}}</span></div>
						</div>
					</div>
					<div class="card-footer py-1 px-1">
						<a href="{{route('video.subject',[$data2->group->level->slug,$data2->group->slug,$data2->slug])}}" class="btn btn-danger w-100 d-flex justify-content-between align-items-center">
							<span><img src="{{asset('media/icons/click.gif')}}" alt="" class="align-self-end" width="30px" height="30px" /></span>
							<span>Akses Kelas</span>
							<span></span>
						</a>
					</div>
				</div>
			</div>
			@endforeach
			
		</div>

	</div>

	@endforeach

</div>

@endsection

@section('scriptEnd')
<script>
	var element = document.getElementById("kelas1");
	element.classList.add("active");
</script>
<script>
	var element = document.getElementById("kt_tab_pane_1");
	element.classList.add("show");
	element.classList.add("active");

</script>


@endsection