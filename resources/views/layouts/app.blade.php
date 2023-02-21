<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/main.js', 'resources/css/app.css'])
</head>

<body>
    <div id="app" style="min-height:100vh;position:relative;">
        @if (Request::getRequestUri() == '/')
            <img src="https://images.pexels.com/photos/4571219/pexels-photo-4571219.jpeg" id="bgimage"
                style="filter:brightness(20%);z-index:-1;position:fixed;height: 100vh;width: 100%;object-fit: cover;">
        @else
            <img src="https://images.pexels.com/photos/4571219/pexels-photo-4571219.jpeg" id="bgimage"
                style="filter:brightness(5%);z-index:-1;position:fixed;height: 100vh;width: 100%;object-fit: cover;">
        @endif
        <nav style="background: transparent;" class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <span class="maincolor text-warning">WiMusic</span>
                </a>
                <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="{{ url('artistes') }}">Artiste</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="{{ url('discover') }}">Discover</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-warning" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-warning"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-warning dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="fixed-bottom bg-black justify-content-around p-3 d-flex">
            <i class="fa-solid fa-arrow-left text-white"></i>
            <i id="run" class="fa-solid fa-play  text-warning"></i>
            <i class="fa-solid fa-arrow-right text-white"></i>
        </div>
    </div>
</body>

</html>
