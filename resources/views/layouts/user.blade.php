<!DOCTYPE html>
<html lang="en">

<head>
    <title>Unica - University Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="Unica University Template">
    <meta name="keywords" content="event, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{ asset('user_assets/img/favicon.ico') }}" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/xatta.css') }}" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @stack('styles')
    @livewireStyles


    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- header section -->
    <header class="header-section">
        <div class="container">
            <!-- logo -->
            <a href="index.html" class="site-logo"><img src="{{ asset('user_assets/img/logo.png') }}"
                    alt=""></a>
            <div class="nav-switch">
                <i class="fa fa-bars"></i>
            </div>
            <div class="header-info">
                <div class="hf-item">
                    <i class="fa fa-clock-o"></i>
                    <p><span>Working time:</span>Monday - Friday: 08 AM - 06 PM</p>
                </div>
                <div class="hf-item">
                    <i class="fa fa-map-marker"></i>
                    <p><span>Find us:</span>40 Baria Street 133/2, New York City, US</p>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end-->


    <!-- Header section  -->
    @include('user.shared.nav')
    <!-- Header section end -->

    {{ $slot }}




    <!-- Footer section -->
    @include('user.shared.footer')
    <!-- Footer section end-->



    <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('user_assets/js/jquery-3.2.1.min.js') }} "></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script src="{{ asset('user_assets/js/owl.carousel.min.js') }} "></script>
    <script src="{{ asset('user_assets/js/jquery.countdown.js') }} "></script>
    <script src="{{ asset('user_assets/js/masonry.pkgd.min.js') }} "></script>
    <script src="{{ asset('user_assets/js/magnific-popup.min.js') }} "></script>
    <script src="{{ asset('user_assets/js/main.js') }} "></script>

    @stack('scripts')
    @livewireScripts

</body>

</html>
