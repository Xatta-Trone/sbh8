<div class="navbar-area sticky-top custom-navbar">
    <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
            <a class="navbar-brand d-block d-lg-none " href="{{ route('home') }}"><img src="{{ $logo }}"
                    alt="{{ $site_name }}" height="55"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> <i class="fa fa-bars" aria-hidden="true"></i> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 p-0">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Home </a>
                    </li>
                    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="/about">About </a>
                    </li>

                    <li class="nav-item {{ request()->is('history') ? 'active' : '' }}">
                        <a class="nav-link" href="/history">History </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('administration') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('administration') }}">Administration</a>
                    </li>
                    <li class="nav-item {{ request()->is('residents') ? 'active' : '' }}">
                        <a class="nav-link" href="/residents">Residents </a>
                    </li>
                    <li class="nav-item {{ request()->is('activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/activities">Activities </a>
                    </li>

                    <li
                        class="nav-item dropdown {{ request()->is('alumni*') || request()->is('about-shbaa') || request()->is('are-you-a-member-of-sbhaa') || request()->is('membership') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            alumni
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/about-shbaa">About sbhaa</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('alumni') }}">Notable alumni</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('alumni-list') }}">Alumni List</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/membership">membership</a>
                        </div>
                    </li>




                    <li class="nav-item {{ request()->is('notices*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('notice') }}">notice board</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact') }}">contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="https://www.buet.ac.bd/" target="_blank">BUET Home </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link quadrat" href="https://reunion.sherebanglahall.buet.ac.bd/"
                            target="_blank">Reunion
                            2022</a>
                    </li>



                </ul>

            </div>
        </nav>

    </div>

    <style>
        .nav-link {
            padding: 25px 15px !important;
            display: inline-block;
        }

        .quadrat {
            /* -webkit-animation: NAME-YOUR-ANIMATION 1s infinite;

            -moz-animation: NAME-YOUR-ANIMATION 1s infinite;

            -o-animation: NAME-YOUR-ANIMATION 1s infinite;

            animation: NAME-YOUR-ANIMATION 1s infinite;

            animation-timing-function: linear; */

            -moz-transition: all 1s ease-in-out;
            -webkit-transition: all 1s ease-in-out;
            -o-transition: all 1s ease-in-out;
            -ms-transition: all 1s ease-in-out;
            transition: all 1s ease-in-out;
            -moz-animation: NAME-YOUR-ANIMATION normal 1.5s infinite ease-in-out;
            /* Firefox */
            -webkit-animation: NAME-YOUR-ANIMATION normal 1.5s infinite ease-in-out;
            /* Webkit */
            -ms-animation: NAME-YOUR-ANIMATION normal 1.5s infinite ease-in-out;
            /* IE */
            animation: NAME-YOUR-ANIMATION normal 1.5s infinite ease-in-out;
            /* IE 10+, Fx 29+ */
        }

        @-webkit-keyframes NAME-YOUR-ANIMATION {

            0%,
            49% {
                background-color: white;
                color: #7b0100;
                /* border: 3px solid #e50000; */
            }

            50%,
            100% {
                background-color: #7b0100;
                color: white;
            }
        }
    </style>
</div>
