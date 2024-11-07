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

        @yield('content')


        @include('layouts.footer')
        @livewireScripts
    </div>

    @vite('resources/js/dark.js')
    @vite('resources/js/sidebar.js')

    @vite('resources/js/simple-datatable.js')
    @vite('resources/js/table.js')
    @stack('scripts')
</body>

</html>
