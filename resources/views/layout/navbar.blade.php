  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ConnectFriend</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex align-items-center" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('friends') }}">Friends</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Avatar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chat</a>
                </li>
            </ul>
            <div class="d-flex flex-row gap-4"> 
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ app()->getLocale() == 'en' ? 'English' : 'Indonesia' }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li>
                            <a class="dropdown-item" href="">English</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="">Indonesia</a>
                        </li>
                    </ul>
                </div>
                @if(Auth::check())
                    <div class="d-flex flex-row align-items-center gap-2">
                        <p class="text-center my-auto">Your Coins: {{ Auth::user()->coin_balance }}</p>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        </a>
                    </div>
                    <a href="#" class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                        </svg>
                    </a>
                    <a href="#">
                        <img src="{{ Auth::user()->profile_picture ?: asset('assets/default-profile.jpg') }}" alt="Profile Picture" class="rounded-circle" style="height: 40px; width: 40px;">
                    </a>
                @else
                    <div class="d-flex flex-row align-items-center gap-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
                    </div>
                 @endif
            </div>
      </div>
    </div>
  </nav>