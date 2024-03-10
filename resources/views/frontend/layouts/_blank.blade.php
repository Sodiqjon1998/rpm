<!DOCTYPE html>
<html lang="en">

<head>

    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />

    <!-- DESCRIPTION -->
    <meta name="description" content="EduChamp : Education HTML Template" />

    <!-- OG -->
    <meta property="og:title" content="EduChamp : Education HTML Template" />
    <meta property="og:description" content="EduChamp : Education HTML Template" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />

    <!-- PAGE TITLE HERE ============================================= -->
    <title> Register </title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
 <script src="assets/js/html5shiv.min.js"></script>
 <script src="assets/js/respond.min.js"></script>
 <![endif]-->

    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('f/assets/css/assets.css') }}">

    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('f/assets/css/typography.css') }}">

    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('f/assets/css/shortcodes/shortcodes.css') }}">

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('f/assets/css/style.css') }}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('f/assets/css/color/color-1.css') }}">

</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>

        <div class="account-form">
            @yield('content')
        </div>
    </div>
    <!-- External JavaScripts -->
    <script src="{{ asset('f/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/counter/waypoints-min.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/counter/counterup.min.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/imagesloaded/imagesloaded.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/masonry/masonry.js') }}"></script>
    <script src="{{ asset('f/assets/vendors/masonry/filter.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('f/assets/js/functions.js') }}"></script>
    <script src="{{ asset('f/assets/js/contact.js') }}"></script>
    <script src='{{ asset('f/assets/vendors/switcher/switcher.js') }}'></script>
</body>

</html>
