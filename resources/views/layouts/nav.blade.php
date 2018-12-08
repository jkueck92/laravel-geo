<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <span class="navbar-brand mb-0 h1">geo</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Home
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuContinents" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Continents
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuContinents">
                        <a class="dropdown-item" href="{{ route('continents.index') }}">Index</a>
                        <a class="dropdown-item" href="{{ route('continents.create') }}">Create</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('continents.trashed') }}">Trashed</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuCountries" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Countries
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuCountries">
                        <a class="dropdown-item" href="{{ route('countries.index') }}">Index</a>
                        <a class="dropdown-item" href="{{ route('countries.create') }}">Create</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('countries.trashed') }}">Trashed</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuAirports" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Airports
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAirports">
                        <a class="dropdown-item" href="{{ route('airports.index') }}">Index</a>
                        <a class="dropdown-item" href="{{ route('airports.create') }}">Create</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('airports.trashed') }}">Trashed</a>
                    </div>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @endif
            </ul>

        </div>
    </div>
</nav>