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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="app">
        <div class="header-img"></div>
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('main.home') }}">
                    <img src="{{ asset('/images/logoZT.png') }}" alt="" height="75" class="d-inline-block pe-3 me-3">
                    <span class="brand-text">De Breimeisjes</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        @foreach([
                            'main.home'=>'Home',
                            'main.designs'=>'Ontwerpen',
                            'main.news'=>'Nieuws',
                            'main.about'=>'Over Mij',
                            'main.contact'=>'Contact',
                        ] as $route=> $label)
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName() === $route) active @endif" href="{{ route($route) }}">{{ $label }}</a>
                            </li>
                        @endforeach
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="nav-link">
                                    Log uit
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endauth
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
                <h4>Stuur mij een bericht</h4>
                <p><a href="mailto:debreimeisjes@gmail.com">debreimeisjes@gmail.com</a></p>
            </div>
            <div class="col-md-6 text-center my-3">
                <h4>Volg me hier!</h4>
                <p class="logo">
                    <a href="https://www.ravelry.com/designers/akkelien-smink" title="Ravelry"><i class="fab fa-ravelry mx-1"></i></a> {{-- Ravelry --}}
                    <a href="https://debreimeisjes.blogspot.com/" title="Blogger"><i class="fab fa-blogger mx-1"></i></a> {{-- Blogger --}}
                    <a href="https://breiclub.nl/author/akkelien/" title="Breiclub" class="mx-1">
                        <i class="demo-icon icon-breiclub">&#xe800;</i> <span class="i-name">icon-breiclub</span><span class="i-code">0xe800</span>
                    </a>
                    <a href="https://www.facebook.com/debreimeisjes/" title="Facebook"><i class="fab fa-facebook mx-1"></i></a> {{-- Facebook --}}
                    <a href="https://www.instagram.com/debreimeisjes/" title="Instagram"><i class="fab fa-instagram mx-1"></i></a> {{-- Instagram --}}
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
