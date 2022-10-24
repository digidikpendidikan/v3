@extends('layouts.app')

@section('title')
    <title>Video {{$video->nama}} - {{$video->chapter->subject->nama}} {{$video->chapter->subject->group->nama}}</title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Bimbingan belajar online gratis untuk pelajar Indonesia. Vidio belajar gratis, tryout gratis, ">
    <meta name="keywords" content="Bimbingan Belajar, Bimbel Online, Bimbel Gratis">
    <meta name="author" content="Digidik">
    <meta name="_token" content="{{csrf_token()}}" />
@endsection

@section('scriptStart')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous">
</script>
@endsection

@section('heading')
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <h1 class="fs-1 fw-bolder">Video {{$video->nama}}</h1>
        <ul class="breadcrumb fw-bold fs-base my-1">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}" class="text-danger">Digidik</a>
            </li>
			<li class="breadcrumb-item">
                <a href="{{route('video.index')}}" class="text-danger">Video Belajar</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('video.level',$video->chapter->subject->group->level->slug)}}" class="text-danger">{{ Str::upper($video->chapter->subject->group->level->slug)}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('video.subject',[$video->chapter->subject->group->level->slug,$video->chapter->subject->group->slug,$video->chapter->subject->slug])}}" class="text-danger">{{$video->chapter->subject->nama}}</a>
            </li>
            <li class="breadcrumb-item">{{$video->chapter->nama}}</li>
            <li class="breadcrumb-item">{{$video->nama}}</li>
        </ul>
    </div>
@endsection

@section('back')
href="{{route('video.subject',[$video->chapter->subject->group->level->slug,$video->chapter->subject->group->slug,$video->chapter->subject->slug])}}"
@endsection

@section('content')

@auth
<div class="alert alert-warning" role="alert">
	<b>Raih XP:</b> Like atau tandai video.
</div>
@endauth

   <!--begin::Forms Widget 9-->
   <div class="card card-custom gutter-b mb-6">
    <!--begin::Body-->
    <div class="card-body p-4">
        <!--begin::Top-->
        <div class="d-flex align-items-center">
            <!--begin::Symbol-->
            <div class="symbol symbol-45 symbol-light me-5">
                <div class="symbol-label" style="background-image: url('{{asset('storage/'.$video->icon)}}')"></div>
            </div>
            <!--end::Symbol-->
            <!--begin::Info-->
            <div class="d-flex flex-column flex-grow-1">
                <h2 class="mb-1 font-weight-bolder">{{$video->nama}} - Bab {{$video->chapter->nama}}</h2>
                <div class="d-flex">
                    <div class="d-flex align-items-center pe-5">
                        <span class="svg-icon svg-icon-md svg-icon-primary pe-1">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Clock.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3" />
                                    <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="text-dark font-weight-bold pe-2">{{$video->durasi}}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="svg-icon svg-icon-md svg-icon-primary pe-1">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-arrange.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="text-dark font-weight-bold">{{$video->pengajar}}</span>
                    </div>
                </div>
            </div>
            <!--end::Info-->
        </div>
        <!--end::Top-->
        <!--begin::Bottom-->
        <div class="pt-3">
            <!--begin::Video-->
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item rounded" src="{{$video->video}}?autoplay=1" allowfullscreen="allowfullscreen"></iframe>
            </div>
            <!--end::Video-->
            <!--begin::Text-->
            <p class="text-dark-75 font-size-lg font-weight-normal pt-5">{{$video->deskripsi}}</p>
            <!--end::Text-->
            <!--begin::Action-->
            <div class="d-flex align-items-center">
                {{-- <a href="#" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-light-primary rounded font-weight-bolder font-size-sm p-2 me-2">
                <span class="svg-icon svg-icon-md svg-icon-primary pr-2">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                            <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>24</a> --}}

                <span id="like">
                    <input type="hidden" name="id" id="like_video_id" value="{{$video->id}}">
                    <button id="ajaxLike" class="btn btn-hover-text-danger btn-hover-icon-danger btn-sm btn-danger btn-text-dark-50 bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2"><span class="svg-icon svg-icon-md svg-icon-dark-25">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Heart.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>{{$video->suka}} Suka</button>
                </span>
    
                <span id="liked" style="display: none">
                    <button disabled class="btn btn-hover-text-danger btn-hover-icon-danger btn-sm btn-danger btn-text-dark-50 bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2"><span class="svg-icon svg-icon-md svg-icon-dark-25">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Heart.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>{{$video->suka+1}} Suka</button>
                </span>

                @if($video->penjelasan!=null)
                <span>
                    <button type="button" data-toggle="modal" data-target="#penjelasan" class="ms-2 btn btn-hover-text-danger btn-hover-icon-danger btn-sm btn-success btn-text-dark-50 bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2"><span class="svg-icon svg-icon-md svg-icon-dark-25">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Heart.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>
                                <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Penjelasan Tekstual</button>
                </span>
                @endif

                @if($video->modul!=null)
                <span>
                    <a href="{{$video->modul}}" target="_blank" class="ms-2 btn btn-hover-text-danger btn-hover-icon-danger btn-sm btn-warning text-black btn-text-dark-50 bg-hover-light-danger rounded font-weight-bolder font-size-sm p-2"><span class="svg-icon svg-icon-md svg-icon-black-25 pr-1">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Heart.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) " x="11" y="1" width="2" height="14" rx="1"/>
                                <path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) "/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Unduh Modul</a>
                </span>
                @endif
            </div>
            <!--end::Action-->
        </div>
        <!--end::Bottom-->
        <!--begin::Separator-->
        <div class="separator separator-solid mt-5 mb-4"></div>
        <!--end::Separator-->
        <div class="d-flex justify-content-between">
            @if($prev!=null)
                <a href="{{route('video.navigation',[$video->chapter_id,$prev])}}" class="btn btn-danger btn-sm font-weight-bold">
                    <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M11.0879549,18.2771971 L17.8286578,12.3976203 C18.0367595,12.2161036 18.0583109,11.9002555 17.8767943,11.6921539 C17.8622027,11.6754252 17.8465132,11.6596867 17.8298301,11.6450431 L11.0891271,5.72838979 C10.8815919,5.54622572 10.5656782,5.56679309 10.3835141,5.7743283 C10.3034433,5.86555116 10.2592899,5.98278612 10.2592899,6.10416552 L10.2592899,17.9003957 C10.2592899,18.1765381 10.4831475,18.4003957 10.7592899,18.4003957 C10.8801329,18.4003957 10.9968872,18.3566309 11.0879549,18.2771971 Z" fill="#000000" transform="translate(14.129645, 12.002277) scale(-1, 1) translate(-14.129645, -12.002277) "/>
                            <rect fill="#000000" opacity="0.3" x="6" y="6" width="3" height="12" rx="1"/>
                        </g>
                    </svg><!--end::Svg Icon--></span>Sebelumnya</a>
            @else
                @if($prevchapter!=null)
                    @if($prevchapter->video->first()!=null)
                    <a href="{{route('video.navigation',[$prevchapter->id,$prevchapter->video->first()->prioritas])}}" class="btn btn-danger btn-sm font-weight-bold">
                        <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M11.0879549,18.2771971 L17.8286578,12.3976203 C18.0367595,12.2161036 18.0583109,11.9002555 17.8767943,11.6921539 C17.8622027,11.6754252 17.8465132,11.6596867 17.8298301,11.6450431 L11.0891271,5.72838979 C10.8815919,5.54622572 10.5656782,5.56679309 10.3835141,5.7743283 C10.3034433,5.86555116 10.2592899,5.98278612 10.2592899,6.10416552 L10.2592899,17.9003957 C10.2592899,18.1765381 10.4831475,18.4003957 10.7592899,18.4003957 C10.8801329,18.4003957 10.9968872,18.3566309 11.0879549,18.2771971 Z" fill="#000000" transform="translate(14.129645, 12.002277) scale(-1, 1) translate(-14.129645, -12.002277) "/>
                                <rect fill="#000000" opacity="0.3" x="6" y="6" width="3" height="12" rx="1"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>Bab Sebelumnya</a>
                    @else
                    <span></span>
                    @endif
                @else
                <span></span>
            @endif
            @endif

            @auth
            @if($ditandai==0)

                <span id="tandai">
                <input type="hidden" name="video" id="tag_video_id" value="{{$video->id}}">
                <input type="hidden" name="user_id" id="tag_user_id" value="{{Auth::user()->id}}">
                <button id="ajaxSubmit" class="btn btn-primary btn-sm font-weight-bold mx-2"><span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"/>
                    </g>
                </svg><!--end::Svg Icon--></span>Tandai</button>
                </span>

                <span id="ditandai" style="display: none">
                    <button class="btn btn-primary btn-sm font-weight-bold mx-2" disabled><span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"/>
                        </g>
                    </svg><!--end::Svg Icon--></span>Telah Ditandai</button>
                    </span>
                    
            @else
                    <span id="ditandai">
                        <button class="btn btn-primary btn-sm font-weight-bold mx-2" disabled><span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>Telah Ditandai</button>
                        </span>

            @endif
            @else
            <a class="btn btn-primary btn-sm font-weight-bold mx-2" id="kt_drawer_chat_toggle">
                <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"/>
                    </g>
                </svg><!--end::Svg Icon--></span>Tandai</a>
            @endauth
            @if($next!=null)
            <a href="{{route('video.navigation',[$video->chapter_id,$next])}}" class="btn btn-danger btn-sm font-weight-bold">
                <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M6.82866499,18.2771971 L13.5693679,12.3976203 C13.7774696,12.2161036 13.7990211,11.9002555 13.6175044,11.6921539 C13.6029128,11.6754252 13.5872233,11.6596867 13.5705402,11.6450431 L6.82983723,5.72838979 C6.62230202,5.54622572 6.30638833,5.56679309 6.12422426,5.7743283 C6.04415337,5.86555116 6,5.98278612 6,6.10416552 L6,17.9003957 C6,18.1765381 6.22385763,18.4003957 6.5,18.4003957 C6.62084305,18.4003957 6.73759731,18.3566309 6.82866499,18.2771971 Z" fill="#000000"/>
                        <rect fill="#000000" opacity="0.3" transform="translate(16.500000, 12.000000) scale(-1, 1) translate(-16.500000, -12.000000) " x="15" y="6" width="3" height="12" rx="1"/>
                    </g>
                </svg><!--end::Svg Icon--></span>Selanjutnya</a>
            @else
                @if($nextchapter!=null)
                @if($nextchapter->video->first()!=null)
                <a href="{{route('video.navigation',[$nextchapter->id,$nextchapter->video->first()->prioritas])}}" class="btn btn-danger btn-sm font-weight-bold">
                    <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M6.82866499,18.2771971 L13.5693679,12.3976203 C13.7774696,12.2161036 13.7990211,11.9002555 13.6175044,11.6921539 C13.6029128,11.6754252 13.5872233,11.6596867 13.5705402,11.6450431 L6.82983723,5.72838979 C6.62230202,5.54622572 6.30638833,5.56679309 6.12422426,5.7743283 C6.04415337,5.86555116 6,5.98278612 6,6.10416552 L6,17.9003957 C6,18.1765381 6.22385763,18.4003957 6.5,18.4003957 C6.62084305,18.4003957 6.73759731,18.3566309 6.82866499,18.2771971 Z" fill="#000000"/>
                            <rect fill="#000000" opacity="0.3" transform="translate(16.500000, 12.000000) scale(-1, 1) translate(-16.500000, -12.000000) " x="15" y="6" width="3" height="12" rx="1"/>
                        </g>
                    </svg><!--end::Svg Icon--></span>Bab Selanjutnya</a>
                @else
                <span></span>
                @endif
                @else
                <span></span>
                @endif
            @endif
     </div>
        <!--edit::Editor-->
    </div>
    <!--end::Body-->
</div>
<!--end::Forms Widget 9-->



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
                <h3>Materi Lainnya</h3>
            </div>
        </div>
        
        <div id="collapseOne6" class="collapse" data-parent="#accordionExample6">
            <div class="card-body">
                @foreach($chapter as $data)
                <!--begin::Item-->
                <a href="{{route('video.lesson',[$data->chapter->subject->group->level->slug,$data->chapter->subject->group->slug,$data->chapter->subject->slug,$data->chapter->slug,$data->slug])}}" class="d-flex flex-wrap align-items-center mb-6 bg-light rounded p-2">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-50 flex-shrink-0 me-4">
                        <div class="symbol-label" style="background-image: url('{{asset('storage/'.$data->icon)}}')"></div>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 me-2">
                        <h3 class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data->nama}}</h3>
                        <span class="text-muted font-weight-bold">{{$data->durasi}}</span>
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
                <h3>Bab Lainnya</h3>
            </div>
        </div>
        
        <div id="collapseOne6" class="collapse" data-parent="#accordionExample6">
            <div class="card-body">
                @foreach($subject as $data)
                <!--begin::Item-->
                @if($data->video->first()!=null)
                    <a href="{{route('video.navigation',[$data->id,$data->video->first()->prioritas])}}" class="d-flex flex-wrap align-items-center mb-6 bg-light rounded p-2">
                @else
                    <a href="{{route('video.subject',[$video->chapter->subject->group->level->slug,$video->chapter->subject->group->slug,$video->chapter->subject->slug])}}" class="d-flex flex-wrap align-items-center mb-6 bg-light rounded p-2">
                @endif
                
                    {{-- {{route('video.navigation',[$data->id,$data->video[0]->prioritas])}} --}}
                    <!--begin::Symbol-->
                    
                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\General\Bookmark.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"/>
                        </g>
                    </svg><!--end::Svg Icon--></span>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 me-2">
                        <h3 class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data->nama}}</h3>
                        <span class="text-muted font-weight-bold">{{$data->durasi}}</span>
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

<!-- Modal-->
<div class="modal fade" id="penjelasan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Penjelasan Tekstual</h5>
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
                {{$video->penjelasan}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger font-weight-bold" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scriptEnd')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous">
</script>
<script>
    jQuery(document).ready(function(){
        jQuery('#ajaxSubmit').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/video/tandai') }}",
                method: 'post',
                data: {
                    user_id: jQuery('#tag_user_id').val(),
                    video_id: jQuery('#tag_video_id').val(),
                },
                success: function(result){
                    var x = document.getElementById("tandai");
                    x.style.display = "none";
                    var y = document.getElementById("ditandai");
                    y.style.display = "block";
                }});
            });

        jQuery('#ajaxLike').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/video/suka') }}",
                method: 'post',
                data: {
                    video_id: jQuery('#like_video_id').val(),
                },
                success: function(result){
                    var x = document.getElementById("like");
                    x.style.display = "none";
                    var y = document.getElementById("liked");
                    y.style.display = "block";
                }});
            });

        });

</script>

@endsection