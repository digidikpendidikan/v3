<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    @yield('scriptStart')
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dark-mode.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</head>
<!--begin::Body-->
<body id="kt_body" style="background-image: url()" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('layouts.menu')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
                        @yield('heading')
                        <!--begin::Wrapper-->
                        <div class="d-flex d-lg-none align-items-center">
                            <!--begin::Aside mobile toggle-->
                            <div class="btn btn-icon btn-danger w-70px h-40px pulse pulse-white me-4" id="kt_aside_toggle">
                                <!--begin::Svg Icon | path: icons/duotone/Communication/Group-chat.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                                            <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                                Menu
                                <!--end::Svg Icon-->
                                <span class="pulse-ring"></span>
                            </div>

                            <!--end::Aside mobile toggle-->
                            <!--begin::Logo-->
                            <a href="{{route('home')}}" class="d-flex align-items-center ms-4">
                                <img alt="Logo" src="{{ asset('media/logos/digidik.png') }}" style="height:50px" />
                            </a>
                            <!--end::Logo-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Toolbar wrapper-->
                        <div class="d-flex flex-shrink-0">
                            <!--begin::Chat-->
                            <div class="d-flex align-items-center ms-3">
                                <!--begin::Menu wrapper-->
                                <div class="btn btn-icon btn-danger w-70px h-40px pulse pulse-white" id="kt_drawer_chat_toggle">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Group-chat.svg-->
                                    <span class="svg-icon svg-icon-2 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                    </span>
                                    @guest
                                     Login
                                    @else
                                     Profil
                                    @endguest
                                    
                                    <!--end::Svg Icon-->
                                    <span class="pulse-ring"></span>
                                </div>
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::Chat-->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                @auth
                <!--begin::Info-->
                <div class="container">

                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4 col-md-6 col-sm-6 col-6 d-none d-md-block">
                            <!--begin::Statistics Widget 2-->
                            <a href="#">
                            <div class="card card-xl-stretch mb-6 bg-secondary">
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-75px text-dark">{{$user->name}}</span>
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <img src="{{asset('media/icons/happy.gif')}}" alt="" class="align-self-end" width="45px" height="45px" />
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="text-dark fw-bold ">{{$user->username}}</div>
                                </div>
                               
                                <!--end::Body-->
                            </div>
                            </a>
                            <!--end::Statistics Widget 2-->
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-6 col-6">
                            <!--begin::Statistics Widget 2-->
                            <a href="#">
                            <div class="card card-xl-stretch mb-6 bg-secondary">
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-75px text-dark">{{$user->xp}}</span>
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <img src="{{asset('media/icons/verified.gif')}}" alt="" class="align-self-end" width="50px" height="50px" />
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="text-dark fw-bold ">Experience</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            </a>
                            <!--end::Statistics Widget 2-->
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-6 col-6">
                            <!--begin::Statistics Widget 2-->
                            <a href="#">
                            <div class="card card-xl-stretch mb-6 bg-secondary">
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-75px text-dark">{{$user->poin}}</span>
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <img src="{{asset('media/icons/favorite.gif')}}" alt="" class="align-self-end" width="50px" height="50px" />
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="text-dark fw-bold ">Poin</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            </a>
                            <!--end::Statistics Widget 2-->
                        </div>

                    </div>
                </div>
                <!--end::Info-->
  
                @endauth

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container" id="kt_content_container">
                        <!-- LIGHT SWITCH -->
                        <div class="d-flex flex-row align-items-center mb-6">
                            
                            <a @yield('back') class="btn btn-sm btn-primary me-3 text-dark ps-1 pe-3 py-1">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo3\dist/../src/media/svg/icons\Navigation\Angle-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>Kembali
                            </a>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="darkSwitch">
                                <label class="custom-control-label" for="darkSwitch">Dark Mode</label>
                            </div>
                        </div>
                        <script src="{{ asset('js/dark-mode-switch.min.js') }}"></script>

                        
                    @if(session()->has('success'))
                    <div class="card card-custom bgi-no-repeat gutter-b card-stretch mb-8" style="background-color: #1B283F;  background-position: calc(100% + 0.5rem) calc(100% + 0.5rem); background-size: 50% auto; background-image: url({{asset('media/svg/patterns/rhone.svg')}})">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="p-1">
                                <h3 class="text-white font-weight-bolder mt-7 mb-4">Selamat Datang {{Auth::user()->name}}!</h3>
                                <p class="text-muted font-size-lg mb-7">{{ session()->get('success') }}</p>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="card card-custom bgi-no-repeat gutter-b card-stretch mb-8" style="background-color: #F1416C;  background-position: calc(100% + 0.5rem) calc(100% + 0.5rem); background-size: 50% auto; background-image: url({{asset('media/svg/patterns/rhone.svg')}})">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="p-4">
                                <h3 class="text-white font-weight-bolder mt-7 mb-4">Mohon Maaf!</h3>
                                <p class="text-white font-size-lg mb-7">{{ session()->get('error') }}</p>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                @endif

                        @guest
                            <div class="card card-custom wave wave-animate wave-danger mb-6">
                                <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="me-6">
                                        <span class="svg-icon svg-icon-danger svg-icon-4x">
                                            <img src="{{asset('media/icons/profile.gif')}}" alt="" class="align-self-end" width="60px" height="60px" />
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h4 class="text-danger font-weight-bolder m-0">Daftar/Login Dulu Yuk! 100% Gratis</h4>
                                        <div class="text-dark-75">
                                            <p class="text-dark my-5 font-size-xl font-weight-bold">Agar kamu bisa menggunakan semua fitur Digidik, yuk daftar dan login akun Digidik terlebih dahulu 😊</p>
                                            <div class="btn btn-icon btn-danger w-70px h-40px pulse pulse-white" id="kt_drawer_chat_toggle">
                                                <!--begin::Svg Icon | path: icons/duotone/Communication/Group-chat.svg-->
                                                <span class="svg-icon svg-icon-2 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                                Login
                                                <span class="pulse-ring"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endguest

                        @yield('content')
                        {{-- KONTEN --}}

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->
                
                @include('layouts.footer')

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    
    @include('layouts.profile')
    
    @include('wa')

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true" style="bottom:100px;">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                    <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->

        <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    @yield('scriptEnd')
    <!--end::Page Vendors Javascript-->
    <script>
        var typed = new Typed("#typed_digidik", {
            strings: ["Bimbel Online Gratis", "Bimbel Online Terlengkap", "Bimbel Online Berkualitas"],
            typeSpeed: 60,
            loop:true
        });
    </script>
    <!--end::Javascript-->
    {{-- <script src="{{ asset('js/switch.js') }}"></script> --}}
   
</body>
</html>
