<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>@yield('title')</title>
  </head>

  <body>

    {{-- NAVBAR #IF --}}
    <nav class="navbar navbar-light bg-light shadow-sm">
        <div class="container p-2">
        <a class="navbar-brand fw-bold" href="/">
            Game<span class="text-danger">SLot</span>
        </a>

        @guest

        @else
        @if(Auth::user()->role == 'admin')
        <a href="/gameManage" class="nav-link">Manage Game</a>
        <a href="/genreManage" class="nav-link">Manage Game Genre</a>
        @endif
        @endguest

        <form class="d-flex" method="get" action="/searchGame">
            <input class="form-control me-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        @if(!Auth::check())
        <div class="d-inline">
            <a class="btn btn-outline-primary" href="/login">Sign In</a>
            <a class="btn btn-primary" href="/register">Sign Up</a>
        </div>
        @endif

        @if(Auth::check())
        <div class="d-flex">
          <div class="dropdown">
              {{-- Cart --}}
              <a class="btn text-secondary" href="/cartPage" style=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg></button></a>
              {{-- Profile --}}
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="@if(Auth::user()->image == "")
                          ../storage/Profile.jpg
                          @else ../storage/{{Auth::user()->image}}
                          @endif"
                          alt="" width="30px" height="30px" class="rounded">
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item disabled" href="#">Hi, <span class="fw-bold">{{Auth::user()->role}}</span></a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/profile">Your Profile</a></li>
                <li><a class="dropdown-item" href="/transactionHistoryy">Transaction History</a></li>
                <li>
                  <form action="/logout" method="post">
                  @csrf
                  <button class="dropdown-item text-danger" type="submit" style="width: 100%">Sign Out</button>
                  </form>
                </li>
              </ul>
            </div>
        @endif

        </div>
    </nav>

    {{-- halaman --}}
    <div class="container">
        <div class="row p-5 justify-content-center">
            @yield('halaman')
        </div>
    </div>

    {{-- footer --}}
    <div class="bg-light text-center p-3">
        © 2021 All rights reserved
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
