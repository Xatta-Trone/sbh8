<div class="navbar-area sticky-top custom-navbar">
    <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
            <a class="navbar-brand d-block d-lg-none " href="{{ route('home') }}"><img src="{{ $logo }}" alt="{{ $site_name }}"
                    height="55"></a>
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
                    <li class="nav-item {{ request()->is('alumni*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('alumni') }}">alumni</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('notice') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('notice') }}">notice board</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact') }}">contact</a>
                    </li>


                </ul>

            </div>
        </nav>

    </div>
</div>
