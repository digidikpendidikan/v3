@extends('layouts.admin')

@section('title')
    <title>Admin Digidik - Buat Video</title>
@endsection

@section('scriptStart')
@endsection

@section('heading')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="fs-1 fw-bolder text-dark">Buat Video</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{route('admin.home')}}" class="text-muted">Digidik</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('admin.video.subject.index')}}" class="text-muted">Mapel</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('admin.video.subject.chapter',$video->chapter->subject->id)}}" class="text-muted">{{$video->chapter->subject->nama}}</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('admin.video.chapter.lesson',$video->chapter->id)}}" class="text-muted">{{$video->chapter->nama}}</a>
            </li>
            <li class="breadcrumb-item">Buat Video</li>
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
@if (session('message'))
    <div class="alert alert-danger" role="alert">
        {{ session('message') }}
    </div>
@endif

<div class="mt-6 mb-6">
    <a href="{{route('admin.video.chapter.lesson',$video->chapter->id)}}" class="btn btn-danger"><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\Media\Backward.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"/>
            <path d="M11.0879549,18.2771971 L17.8286578,12.3976203 C18.0367595,12.2161036 18.0583109,11.9002555 17.8767943,11.6921539 C17.8622027,11.6754252 17.8465132,11.6596867 17.8298301,11.6450431 L11.0891271,5.72838979 C10.8815919,5.54622572 10.5656782,5.56679309 10.3835141,5.7743283 C10.3034433,5.86555116 10.2592899,5.98278612 10.2592899,6.10416552 L10.2592899,17.9003957 C10.2592899,18.1765381 10.4831475,18.4003957 10.7592899,18.4003957 C10.8801329,18.4003957 10.9968872,18.3566309 11.0879549,18.2771971 Z" fill="#000000" opacity="0.3" transform="translate(14.129645, 12.002277) scale(-1, 1) translate(-14.129645, -12.002277) "/>
            <path d="M5.08795487,18.2771971 L11.8286578,12.3976203 C12.0367595,12.2161036 12.0583109,11.9002555 11.8767943,11.6921539 C11.8622027,11.6754252 11.8465132,11.6596867 11.8298301,11.6450431 L5.08912711,5.72838979 C4.8815919,5.54622572 4.56567821,5.56679309 4.38351414,5.7743283 C4.30344325,5.86555116 4.25928988,5.98278612 4.25928988,6.10416552 L4.25928988,17.9003957 C4.25928988,18.1765381 4.48314751,18.4003957 4.75928988,18.4003957 C4.88013293,18.4003957 4.99688719,18.3566309 5.08795487,18.2771971 Z" fill="#000000" transform="translate(8.129645, 12.002277) scale(-1, 1) translate(-8.129645, -12.002277) "/>
        </g>
    </svg><!--end::Svg Icon--></span> Kembali</a>
    </div> 

                {!! Form::model($video,['route'=>['admin.video.lesson.update',$video->id], 'method'=>'put', 'files'=>true])!!}
                    <div class="row">

                        <input type="hidden" id="chapter_id" name="chapter_id" value="{{$video->chapter->id}}">

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Bab ID *</label>
                                {!! Form::text('chapterid',$video->chapter->id,['class'=>$errors->has('chapterid') ? 'form-control is-invalid' : 'form-control', 'required' => 'required', 'disabled' => 'disabled'])!!}
                            </div>
                            @error('chapter_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Bab*</label>
                                {!! Form::text('chaptername',$video->chapter->nama,['class'=>$errors->has('chaptername') ? 'form-control is-invalid' : 'form-control', 'required' => 'required', 'disabled' => 'disabled'])!!}
                            </div>
                            @error('chaptername')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Nama *</label>
                                <br><span>Contoh: Definisi Trigonometri</span>
                                {!! Form::text('nama',null,['class'=>$errors->has('nama') ? 'form-control is-invalid' : 'form-control', 'required' => 'required'])!!}
                            </div>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Prioritas *</label>
                                <br><span>Contoh: isi dengan puluhan, 10 20 30, semakin kecil semakin diutamakan</span>
                                {!! Form::number('prioritas',null,['class'=>$errors->has('prioritas') ? 'form-control is-invalid' : 'form-control','required' => 'required'])!!}
                            </div>
                            @error('prioritas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Slug Saat Ini*</label>
                                <br><span>Contoh: dua-variabel</span>
                                {!! Form::text('sluglama',$video->slug,['class'=>$errors->has('sluglama') ? 'form-control is-invalid' : 'form-control','required' => 'required','disabled' => 'disabled'])!!}
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Slug Baru (Jika Ingin Mengubah)</label>
                                <br><span>Contoh: dua-variabel</span>
                                <input type="text" id="slug" name="slug" class="form-control">
                            </div>
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Durasi *</label>
                                <br><span>Contoh: 5 Menit</span>
                                {!! Form::text('durasi',null,['class'=>$errors->has('durasi') ? 'form-control is-invalid' : 'form-control', 'required' => 'required'])!!}
                            </div>
                            @error('durasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Nama Pengajar *</label>
                                <br><span>Contoh: Afrizal</span>
                                {!! Form::text('pengajar',null,['class'=>$errors->has('pengajar') ? 'form-control is-invalid' : 'form-control', 'required' => 'required'])!!}
                            </div>
                            @error('pengajar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Icon</label>
                                <br>
                                <img src="{{asset('storage/'.$video->icon)}}" style="width: 100px"/>
                                <button class="btn btn-sm btn-success" type="button" data-toggle="collapse" data-target="#collapseIcon" aria-expanded="false" aria-controls="collapseIcon">
                                    <i class="fas fa-exchange-alt"></i> Ganti Icon
                                </button>
                                <div class="collapse" id="collapseIcon">
                                  <div class="card card-body">
                                    <div class="input-group">
                                        <input type="file" name="icon" class="form-control">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            @if ($errors->has('icon'))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->get('icon') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="">Deskripsi *</label>
                                <br><span>Deskripsi materi</span>
                                {!! Form::textarea('deskripsi',null,['class'=>$errors->has('deskripsi') ? 'form-control is-invalid' : 'form-control','required' => 'required'])!!}
                            </div>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="">Sematan Video *</label>
                                <br><span>Sesuai ketentuan</span>
                                {!! Form::text('video',null,['class'=>$errors->has('video') ? 'form-control is-invalid' : 'form-control', 'required' => 'required'])!!}
                            </div>
                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="">Penjelasan</label>
                                <br><span>Penjelasan tekstual videonya</span>
                                {!! Form::textarea('penjelasan',null,['class'=>$errors->has('penjelasan') ? 'form-control is-invalid' : 'form-control'])!!}
                            </div>
                            @error('penjelasan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="">Link Modul</label>
                                <br><span>Sesuai ketentuan</span>
                                {!! Form::text('modul',null,['class'=>$errors->has('modul') ? 'form-control is-invalid' : 'form-control'])!!}
                            </div>
                            @error('modul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="selectstatus">Status <span class="text-danger">*</span></label>
                                <select class="form-control" id="selectstatus" name="status">
                                 <option value="1" @if($video->status==1) selected @endif>Aktif</option>
                                 <option value="0" @if($video->status==0) selected @endif>Tidak Aktif</option>
                                </select>
                               </div>
                        </div>

                     
                        <div class="mb-3">* Wajib Diisi</div>

                        <div class="col-sm-12 mt-3">
                        <button type="submit" class="btn btn-danger"><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\Communication\Sending.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M8,13.1668961 L20.4470385,11.9999863 L8,10.8330764 L8,5.77181995 C8,5.70108058 8.01501031,5.63114635 8.04403925,5.56663761 C8.15735832,5.31481744 8.45336217,5.20254012 8.70518234,5.31585919 L22.545552,11.5440255 C22.6569791,11.5941677 22.7461882,11.6833768 22.7963304,11.794804 C22.9096495,12.0466241 22.7973722,12.342628 22.545552,12.455947 L8.70518234,18.6841134 C8.64067359,18.7131423 8.57073936,18.7281526 8.5,18.7281526 C8.22385763,18.7281526 8,18.504295 8,18.2281526 L8,13.1668961 Z" fill="#000000"/>
                                <path d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M4,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L4,8 C3.44771525,8 3,7.55228475 3,7 C3,6.44771525 3.44771525,6 4,6 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg><!--end::Svg Icon--></span> Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}

@endsection

@section('scriptEnd')
@endsection
</html>