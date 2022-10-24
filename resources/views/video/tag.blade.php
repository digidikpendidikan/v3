@extends('layouts.app')

@section('title')
    <title>Tanda Video Saya  - {{ env('APP_NAME') }}</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Video belajar online gratis untuk pelajar Indonesia tanpa syarat dari Digidik Bimbel Online Gratis.">
    <meta name="keywords" content="Video belajar gratis, Bimbel Online, Bimbel Gratis">
    <meta name="author" content="Digidik">
@endsection

@section('scriptStart')
@endsection

@section('heading')
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <h1 class="fs-1 fw-bolder">Tanda Video Saya</h1>
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}" class="text-danger">Digidik</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('video.index')}}" class="text-danger">Video Belajar</a>
            </li>
            <li class="breadcrumb-item">Tanda Video</li>
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


<h2>Berikut Video yang Kamu Tandai</h2>
@if($tag->count()==0)
<p class="mb-6">Belum ada video yang kamu beri tanda</p>
@else

<div id="collapseOne6" class="collapse show" data-parent="#accordionExample6">
    @foreach($tag as $data)
    <div class="d-flex justify-content-between">
        <div style="width:100%" class="pe-4">
            <!--begin::Item-->
            <a href="{{route('video.lesson',[$data->video->chapter->subject->group->level->slug,$data->video->chapter->subject->group->slug,$data->video->chapter->subject->slug,$data->video->chapter->slug,$data->video->slug])}}" class="d-flex flex-wrap align-items-center mb-6 bg-white rounded p-2">
                <!--begin::Symbol-->
                <div class="symbol symbol-50 flex-shrink-0 me-4">
                    <div class="symbol-label" style="background-image: url('{{asset('storage/'.$data->video->icon)}}')"></div>
                </div>
                <!--end::Symbol-->
                <!--begin::Title-->
                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 me-2">
                    <h3 class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data->video->nama}}</h3>
                    <span class="text-muted font-weight-bold">{{$data->video->chapter->subject->nama}} {{ Str::upper($data->video->chapter->subject->group->slug)}}- {{$data->video->durasi}}</span>
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
        </div>
        <div class="">
            <button type="button" class="btn btn-icon bg-white font-weight-bold mb-6 rounded p-2 deleteAttr" data-toggle="modal" data-target="#hapusTag" data-id="{{$data->id}}" data-title="{{ $data->video->nama}}">
                <span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                    </g>
                </svg><!--end::Svg Icon--></span>
            </button>
        </div>
        <!--end::Item-->         
    </div>
    @endforeach  
</div>

@endif

<!-- Modal-->
<div class="modal fade" id="hapusTag" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-black">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Tanda Video</h5>
                <button type="button" class="btn btn-icon" data-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect x="0" y="7" width="16" height="2" rx="1"/>
                                <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                            </g>
                        </g>
                    </svg><!--end::Svg Icon--></span>
                </button>
            </div>
            <div class="modal-body">
                Benarkah kamu ingin menghapus tanda pada video <b><span id="addTitle"></span></b>?
            </div>
            <div class="modal-footer">
                <form action="{{ route('video.deletetag') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="id" name="id" value="">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger font-weight-bold">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

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


@endsection

@section('scriptEnd')
<script>
    $('.deleteAttr').click(function() {
    var id = $(this).data('id');
    $('#id').val(id);
    } );
</script>

<script>
    $('.deleteAttr').click(function() {
    var title = $(this).data('title');
    document.getElementById("addTitle").innerHTML = title;
    } );
</script>
@endsection