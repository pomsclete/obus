<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Optimal Business Service</title>

    <!-- Fonts -->
    <link rel="icon" type="image/x-icon" href="https://designreset.com/cork/html/src/assets/img/favicon.ico" />
    <link href="{{ asset('layouts/vertical-light-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('layouts/vertical-light-menu/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/vertical-light-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/vertical-light-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @stack('styles')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- Styles -->
    @livewireStyles
</head>

<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->


    @livewire('navbar-component')



    {{-- @livewire('navigation-menu') --}}



    <!-- Page Content -->
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>
        @if (Route::is('parametrage'))
        @else
            @include('layouts.sidebar-param')
        @endif

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content {{ Route::is('parametrage') ? 'ms-0' : '' }}">
            <div class="layout-px-spacing">
                {{ $slot }}

            </div>

            <!--  BEGIN FOOTER  -->
            @if (Route::is('parametrage'))
            @else
                <div class="footer-wrapper">
                    <div class="footer-section f-section-1">
                        <p class="">Copyright © <span class="dynamic-year">{{ date('Y') }}</span> <a
                                target="_blank" href="https://linkedin.com/in/amath-thiam/">RSI</a>, All rights
                            reserved.</p>
                    </div>
                    <div class="footer-section f-section-2">
                        <p class="">EPF AFRICA <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                </path>
                            </svg></p>
                    </div>
                </div>
            @endif

            <!--  END FOOTER  -->

            <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->

            <script src="{{ asset('src/plugins/src/global/vendors.min.js') }}"></script>
            <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
            <script src="{{ asset('src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
            <script src="{{ asset('src/plugins/src/waves/waves.min.js') }}"></script>
            <script src="{{ asset('layouts/vertical-light-menu/app.js') }}"></script>
            <!-- END GLOBAL MANDATORY SCRIPTS -->

            <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
            @stack('scripts')
            <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
            @stack('modals')
            @livewireScripts
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <x-livewire-alert::scripts />
            @yield('script')
</body>

</html>
