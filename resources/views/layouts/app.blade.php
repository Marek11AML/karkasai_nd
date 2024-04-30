<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Conference App')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-light bg-light justify-content-center mb-5">
        @guest
            <a href="{{ route('show-login') }}">
                <button class="btn btn-outline-primary mx-3">Login</button>
            </a>
        @else
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-secondary mx-3">Logout</button>
            </form>
        @endguest
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
