<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Title -->
    <title>@yield('title')</title>

    {{-- Meta tags --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="DC.Description" content="Somos una empresa inmobiliaria que te ofrece servicios personalizados y de calidad desde el 2015." />
    <meta http-equiv="Content-Language" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta name="author" content="{{ config('app.name') }}" />
    <meta name="robots" content="all" />
    <meta name="distribution" content="global" />
    <meta name="resource-type" content="Document" />
    <meta name="Revisit" content="2 days" />
    <meta name="robots" content="all" />    
    <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}" />    
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ asset('assets/admin/media/logos/logo.png') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />

    <noscript>Your browser does not support JavaScript!</noscript>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/client') }}/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/client') }}/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/client') }}/images/icons/favicon-16x16.png">
    <link rel="mask-icon" href="{{ asset('assets/client') }}/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="{{ asset('assets/client') }}/images/icons/favicon.ico">
    
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/style.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/demos/demo-5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/custom.css">
    <link rel="stylesheet" href="{{ asset('assets/client/vendor/font-awesome/css/all.min.css') }}"/>

    @laravelPWA
    @livewireStyles
    @stack('head')
    @yield('head')
</head>

<body>
    <div class="page-wrapper">  
        @include('client.layouts.header-5')
        <main class="main">
            @yield('content')            
        </main>
        @include('client.layouts.footer')
    </div>¿

    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
    <div class="mobile-menu-overlay"></div>
    @include('client.layouts.menu-mobile')

    <!-- Plugins JS File -->
    <script src="{{ asset('assets/client') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/jquery.hoverIntent.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/superfish.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/bootstrap-input-spinner.js"></script>
    <script src="{{ asset('assets/client') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets/client') }}/js/main.js"></script>
    <script src="{{ asset('assets/client') }}/js/demos/demo-5.js"></script>
    @livewireScripts		
    <script type="module" src="{{ asset('assets/admin/js/cdn/alpine.js') }}"></script>
	<script nomodule src="{{ asset('assets/admin/js/cdn/alpine-ie.js') }}"></script>

    @yield('footer')
    @stack('footer')
</body>

</html>