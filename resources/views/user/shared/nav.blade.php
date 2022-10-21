<nav class="nav-section">
        <div class="container">
            {{-- <div class="nav-right">
                <a href=""><i class="fa fa-search"></i></a>
                <a href=""><i class="fa fa-shopping-cart"></i></a>
            </div> --}}
            <ul class="main-menu">
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">History</a></li>
                <li><a href="{{ route('administration') }}">Administration</a></li>
                <li><a href="#">Residents</a></li>
                <li><a href="#">Activities</a></li>
                <li><a href="{{ route('alumni') }}">Alumni</a></li>
                <li><a href="{{ route('notice') }}">Notice Board</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>
