<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


    <title>Manejo de Inventario</title>
    {{-- <title>@yield('title', 'Dashboard')</title> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles and js -->
    @vite('resources/css/table.css')
    @vite('resources/css/simple-datatable.css')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @vite('resources/css/app-dark.css')
    @vite('resources/css/iconly.css')

    @livewireStyles
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

        <div id="main" class='layout-navbar navbar-fixed'>
            @include('layouts.header')

            <div id="main-content">
                @yield('content')
            </div>

            @include('layouts.footer')
        </div>

        @livewireScripts
    </div>

    @vite('resources/js/dark.js')
    @vite('resources/js/sidebar.js')

    @stack('scripts')
</body>

</html>
