<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/client') }}/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/client') }}/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/client') }}/images/icons/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('assets/client') }}/images/icons/site.webmanifest">
    <link rel="mask-icon" href="{{ asset('assets/client') }}/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="{{ asset('assets/client') }}/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('assets/client') }}/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/client') }}/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/plugins/magnific-popup/magnific-popup.css">
    
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/skins/skin-demo-16.css">
    <link rel="stylesheet" href="{{ asset('assets/client') }}/css/demos/demo-16.css">
</head>

<body>
    <div class="page-wrapper">  
        
        @include('client.layouts.header')

        <main class="main">
            @yield('content')            
        </main><!-- End .main -->

        @include('client.layouts.footer')
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

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

    <!-- Main JS File -->
    <script src="{{ asset('assets/client') }}/js/main.js"></script>
    <script src="{{ asset('assets/client') }}/js/demos/demo-17.js"></script>
</body>

</html>