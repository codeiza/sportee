<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sportee') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <link rel="stylesheet" href="./../css/style.css">

    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div id="app">
        <header>
            <img src="./../img/logo.png" alt="logo" id="logo" />

            <div class="bx bx-menu" id="menu-icon"></div>

            <ul class="navbar">
                <li><a href="/home" class="text-decoration-none">Home</a> </li>
                <li><a href="{{ route('show.profile') }}" class="text-decoration-none">Profile</a></li>
                <li> <a href="{{ route('logout') }}" class="text-decoration-none"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                {{-- <li class="dropdown">
                    <span id="navbarDropdown" class="dropdown-toggle" tabindex="0">
                        {{ Auth::user()->fname }}
                    </span>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li> --}}

            </ul>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
