<link rel="stylesheet" href="{{ asset('dist/css/fontawesome.min.css') }}">

<link rel="icon" href="{{ asset('images/h.png') }}" type="image/icon type">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/templatemo.css') }}">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
<link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:sth.aadarsh53@yahoo.com">sth.aadarsh53@yahoo.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:9846704015">9846704015</a>
            </div>

        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text logo h2 align-self-center" href="{{ route('fronthome') }}">
            Chautari
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fronthome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showrooms') }}">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutus') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactus') }}">Contact</a>
                    </li>


                </ul>
            </div>





                <div class="d-flex align-items-center py-3">


                        @if (Route::has('login'))

                            @auth
                            <a class="nav-link" href="{{ route('mybookings') }}">My Bookings</a>
                            <a class="nav-link" href="{{ route('myprofile') }}">Profile</a>

                                 <a href="{{ route('fronthome') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                       Logout
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                  @csrf
                              </form>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                             @endauth
                    @endif
                </div>
        </div>
    </div>
</nav>
