@extends('layouts.app')

@section('title')
    <title>Edit Profil - Digidik</title>
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
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="fs-1 fw-bolder text-dark">Edit Profil</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{route('home')}}" class="text-muted">Digidik</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('home')}}" class="text-muted">Profil</a>
            </li>
            <li class="breadcrumb-item">Edit Profil</li>
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
        @include('profile/header')
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0 text-dark">Edit Profil Saya</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div>
                <!--begin::Form-->
                {!! Form::model($user,['route'=>['profile.update',$user->id], 'method'=>'PUT', 'files'=>true])!!}
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6 text-gray-800">Foto Profil</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(@if($user->foto==null) {{asset('media/avatars/user.jpg')}} @else {{asset('storage/'.$user->foto)}} @endif)"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ganti Foto">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                        {{-- <input type="hidden" name="avatar_remove" /> --}}
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batalkan foto">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus foto">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Tipe file: png, jpg, jpeg.</div>

                                @if ($errors->has('foto'))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->get('foto') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </ul>
                            @endif
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Nama Lengkap</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Pakai Nama Asli Ya!"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {!! Form::text('name',$user->name,['class'=>$errors->has('name') ? 'form-control form-control-lg form-control-solid is-invalid' : 'form-control form-control-lg form-control-solid', 'required' => 'required','placeholder' => 'Isikan nama lengkap kamu'])!!}
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">No. HP / WhatsApp</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="No HP Aktif Ya!"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{-- <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->hp}}" required autocomplete="phone"> --}}
                                {!! Form::text('phone',$user->hp,['class'=>$errors->has('phone') ? 'form-control form-control-lg form-control-solid is-invalid' : 'form-control form-control-lg form-control-solid', 'id'=>'phone','placeholder' =>'Isikan no. WA kamu'])!!}
                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            <!--end::Col-->
                        </div>

                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Jenjang</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {!! Form::select('jenjang',[ 
                                'SD' => 'SD Sederajat',
                                'SMP' => 'SMP Sederajat',
                                'SMA' => 'SMA Sederajat',
                                'Umum' => 'Umum'],
                                $user->jenjang, ['class'=>'form-select form-select-solid form-select-lg fw-bold','required' => 'required','data-control' => 'select2','placeholder' => 'Pilih jenjang pendidikan']) !!}
                            </div>
                            @if ($errors->has('jenjang'))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->get('jenjang') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </ul>
                            @endif
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Sekolah/Instansi</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {!! Form::text('sekolah',$user->sekolah,['class'=>$errors->has('sekolah') ? 'form-control form-control-lg form-control-solid is-invalid' : 'form-control form-control-lg form-control-solid', 'required' => 'required','placeholder' => 'Isikan nama sekolah kamu'])!!}
                            </div>
                            @error('sekolah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Provinsi</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Provinsi Sekolahmu Berada"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {!! Form::select('provinsi',[ 
                                'DKI Jakarta' => 'DKI Jakarta',
                                'Jawa Barat' => 'Jawa Barat',
                                'Banten' => 'Banten',
                                'Jawa Tengah' => 'Jawa Tengah',
                                'DI Yogyakarta' => 'DI Yogyakarta',
                                'Jawa Timur' => 'Jawa Timur',
                                'Bali' => 'Bali',
                                'Nanggroe Aceh Darussalam' => 'Nanggroe Aceh Darussalam',
                                'Sumatera Utara' => 'Sumatera Utara',
                                'Sumatera Barat' => 'Sumatera Barat',
                                'Bengkulu' => 'Bengkulu',
                                'Riau' => 'Riau',
                                'Kepulauan Riau' => 'Kepulauan Riau',
                                'Jambi' => 'Jambi',
                                'Sumatera Selatan' => 'Sumatera Selatan',
                                'Lampung' => 'Lampung',
                                'Bangka Belitung' => 'Bangka Belitung',
                                'Kalimantan Timur' => 'Kalimantan Timur',
                                'Kalimantan Barat' => 'Kalimantan Barat',
                                'Kalimantan Tengah' => 'Kalimantan Tengah',
                                'Kalimantan Selatan' => 'Kalimantan Selatan',
                                'Kalimantan Utara' => 'Kalimantan Utara',
                                'Nusa Tenggara Barat' => 'Nusa Tenggara Barat',
                                'Nusa Tenggara Timur' => 'Nusa Tenggara Timur',
                                'Sulawesi Utara' => 'Sulawesi Utara',
                                'Sulawesi Barat' => 'Sulawesi Barat',
                                'Sulawesi Tengah' => 'Sulawesi Tengah',
                                'Gorontalo' => 'Gorontalo',
                                'Sulawesi Tenggara' => 'Sulawesi Tenggara',
                                'Sulawesi Selatan' => 'Sulawesi Selatan',
                                'Maluku Utara' => 'Maluku Utara',
                                'Maluku' => 'Maluku',
                                'Papua Barat' => 'Papua Barat',
                                'Papua' => 'Papua',
                                'Papua Selatan' => 'Papua Selatan',
                                'Papua Tengah' => 'Papua Tengah',
                                'Papua Pegunungan' => 'Papua Pegunungan'],
                                $user->provinsi, ['class'=>'form-select form-select-solid form-select-lg fw-bold','required' => 'required','data-control' => 'select2','placeholder' => 'Pilih provinsi sekolahmu']) !!}
                            </div>
                            @if ($errors->has('provinsi'))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->get('provinsi') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </ul>
                            @endif
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">Jenis Kelamin</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {!! Form::select('jk',[ 
                                'Laki-laki' => 'Laki-laki',
                                'Perempuan' => 'Perempuan'],
                                $user->jk, ['class'=>'form-select form-select-solid form-select-lg fw-bold','required' => 'required','data-control' => 'select2','placeholder' => 'Pilih jenis kelamin']) !!}
                            </div>
                            @if ($errors->has('jk'))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->get('jk') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </ul>
                            @endif
                            <!--end::Col-->
                        </div>

                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6 required" for="bio">Bio</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {!! Form::textarea('bio',$user->bio,['class'=>$errors->has('bio') ? 'form-control form-control-lg form-control-solid is-invalid' : 'form-control form-control-lg form-control-solid', 'required' => 'required','placeholder' => 'Deskripsikan dirimu'])!!}
                            </div>
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            <!--end::Col-->
                        </div>
                        {{-- <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Jenis Kelamin</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Options-->
                                <div class="d-flex align-items-center mt-3">
                                    <!--begin::Option-->
                                    <label class="form-check form-check-inline form-check-solid me-5">
                                        <input class="form-check-input" name="communication[]" type="checkbox" value="Laki-laki" />
                                        <span class="fw-bold ps-2 fs-6">Laki-laki</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label class="form-check form-check-inline form-check-solid">
                                        <input class="form-check-input" name="communication[]" type="checkbox" value="Perempuan" />
                                        <span class="fw-bold ps-2 fs-6">Perempuan</span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Col-->
                        </div> --}}
                        <!--end::Input group-->
                        {{-- <!--begin::Input group-->
                        <div class="row mb-0">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Allow Marketing</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <div class="form-check form-check-solid form-switch fv-row">
                                    <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" />
                                    <label class="form-check-label" for="allowmarketing"></label>
                                </div>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group--> --}}
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan</button>
                    </div>
                    <!--end::Actions-->
                {!! Form::close() !!}
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
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
    <script src="{{ asset('js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('js/custom/modals/two-factor-authentication.js') }}"></script>
    <script src="{{ asset('js/custom/widgets.js') }}"></script>
    <script src="{{ asset('js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('js/custom/modals/upgrade-plan.js') }}"></script>
@endsection