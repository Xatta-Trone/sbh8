<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title." :: ".$site_name ?? config('app.name', 'Sher-E-Bangla Hall, BUET') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{ $logo }}" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/font-awesome.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('user_assets/css/themify-icons.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('user_assets/css/magnific-popup.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('user_assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/xatta.css') }}" />

    {!! SEO::generate() !!}

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @stack('styles')
    @livewireStyles

    {{-- settings links --}}
    {!! $links !!}


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
    <header class="header-section d-none d-lg-block">
        <div class="container">
            <!-- logo -->
            <a href="{{ route('home') }}" class="site-logo pt-0"><img src="{{ $logo }}" height="50"
                    alt=""><span class="header-name">{!! $name_short !!} <br> Bangladesh University of Engineering & Technology (BUET)</span></a>
            <div class="nav-switch">
                <i class="fa fa-bars"></i>
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
    {{-- <script src="{{ asset('user_assets/js/jquery.countdown.js') }} "></script> --}}
    {{-- <script src="{{ asset('user_assets/js/masonry.pkgd.min.js') }} "></script> --}}
    {{-- <script src="{{ asset('user_assets/js/magnific-popup.min.js') }} "></script> --}}
    <script src="{{ asset('user_assets/js/main.js') }} "></script>

    @stack('scripts')
    @livewireScripts

    {{-- settings scripts --}}
    {!! $scripts !!}

</body>

</html>
