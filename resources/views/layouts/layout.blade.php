<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=2.0, minimum-scale=0.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

<header>
    <nav>
        @auth()
            <a href="{{ url('/logout') }}">Log out</a>
        @else
            @if (\Illuminate\Support\Facades\Route::has('login'))
                <a href="{{ route('login') }}">Log in</a>
            @endif
            @if(\Illuminate\Support\Facades\Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>

</footer>

</body>
</html>
