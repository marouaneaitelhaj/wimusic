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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/main.js', 'resources/css/app.css'])
</head>

<body class="bg-black">
    <div id="app" style="min-height:100vh;position:relative;">
        <nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-sm">
    <div class="container-fluid">
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
            <ul class="navbar-nav me-auto mb-2 mb-md-0">

            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                @if (url()->current() == 'http://127.0.0.1:8000/discover')
                    <li class="nav-item">
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="search" id="form1" class="form-control" />
                            </div>
                            <button type="button" class="btn btn-warning">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </li>
                @endif

                @if (auth()->guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                @endif
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="{{ url('artistes') }}">Artiste</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="{{ url('discover') }}">Discover</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="{{ url('bandes') }}">Bandes</a>
                        </li>
                        @unless(auth()->guard('admin')->check() ||
                                auth()->guard('web')->check())
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
                                    @if (auth()->guard('admin')->check())
                                        Admin
                                    @else
                                        {{ Auth::user()->name }}
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (auth()->guard('web')->check())
                                        <a class="dropdown-item"
                                            href="{{ url('profile/' . Auth::user()->id) }}">Profile</a>
                                    @endif
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
                        @endunless
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="d-flex justify-content-center">
                @if (session()->has('done'))
                    <div class="d-flex justify-content-center bg-white w-50">
                        <p class="text-black">{{ session()->get('done') }}</p>
                    </div>
                @endif
            </div>
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
