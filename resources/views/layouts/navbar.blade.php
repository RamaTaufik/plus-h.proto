<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-sec shadow-sm">
    <div class="container">
        <div style="max-width:25px;">
            <img src="{{ url('icon.png') }}" class="img-fluid border-radius-sm" alt="Responsive image">
        </div>
        <div class="text-white" style="min-width:70px;">
            {{ __('PLUS-H') }}
        </div>
        <form action="{{ route('search') }}" method="GET">
            <div class="input-group" style="max-width:300px;">
                <div class="form-outline">
                    <input type="text" name="search" id="form1" class="form-control" placeholder="Cari" maxlength="255" style="margin-left:20px;border:1px solid #ffffff;" @if(isset($req)) value="{{$req}}" @endif />
                </div>
                <button type="submit" class="btn btn-light" style="margin-left:15px;">
                    <i class="fas fa-search text-primary"></i>
                </button>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @guest
                    @if (Route::has('login'))

                    @endif
                    @if (Route::has('register'))

                    @endif
                @else
                    @can('access admin')
                    <li class="nav-item text-primary">
                        <a class="nav-link text-white" href="{{ route('admin') }}">
                            {{ __('Admin') }}
                        </a>
                    </li>
                    @endcan
                @endguest
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <img src="{{ url('assets/img/default-user.jpg') }}" alt="" class="pfp">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>