<nav class="nav-section">
    <div class="container">
        {{-- <div class="nav-right">
                <a href=""><i class="fa fa-search"></i></a>
                <a href=""><i class="fa fa-shopping-cart"></i></a>
            </div> --}}
        <ul class="main-menu">
            <li class="active"><a href="{{ route('home') }}">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/history">History</a></li>
            <li><a href="{{ route('administration') }}">Administration</a></li>
            <li><a href="/residents">Residents</a></li>
            <li><a href="/activities">Activities</a></li>
            <li><a href="{{ route('alumni') }}">Alumni</a></li>
            <li><a href="{{ route('notice') }}">Notice Board</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </div>
</nav>

<div class="container sticky-top">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>

        </div>
    </nav>

</div>
