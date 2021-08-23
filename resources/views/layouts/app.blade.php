<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'De Breimeisjes') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
</head>
<body>
    <div id="app">
        <div class="header-img"></div>
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('/images/logoZT.png') }}" alt="" height="75" class="d-inline-block pe-3 me-3">
                    <span class="brand-text">De Breimeisjes</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link @if(Request::route()->getName() === 'home') active @endif" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::route()->getName() === 'designs') active @endif" href="{{ route('designs') }}">Ontwerpen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::route()->getName() === 'news') active @endif" href="{{ route('news') }}">Nieuws</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::route()->getName() === 'about') active @endif" href="{{ route('about') }}">Over Mij</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
        <div class="row g-0">
            <div class="col-md-6 text-center my-3">
                <h5>hoi</h5>
                <p>hoi</p>
            </div>
            <div class="col-md-6 text-center my-3">
                <h5>Volg me hier!</h5>
                <p class="text-primary">
                    <i class="fab fa-blogger"></i> {{-- Blogger --}}
                    <i class="fab fa-ravelry"></i> {{-- Ravelry --}}
                    <i class="fab fa-facebook"></i> {{-- Facebook --}}
                    <i class="fab fa-instagram-square"></i> {{-- Instagram --}}
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
