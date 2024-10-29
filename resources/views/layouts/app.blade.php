<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <title>@yield('title', 'Mi Proyecto')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/iconly.css') }}">

</head>

<body>
    <script>
        const body = document.body;
        const theme = localStorage.getItem('theme')

        if (theme)
            document.documentElement.setAttribute('data-bs-theme', theme)
    </script>

    <div id="app">
        @include('layouts.sidebar')

        @yield('content')


        @include('layouts.footer')
    </div>

    <script src="{{ Vite::asset('resources/js/dark.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/sidebar.js') }}"></script>
</body>

</html>
