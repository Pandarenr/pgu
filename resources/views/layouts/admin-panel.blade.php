<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="prevent-reposition">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }} {{ $title }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="b-color-main">
            @include('parts.menu.navigation')
            <!-- Page Content -->
            <main class="container max-w-7xl mx-auto relative">
                @include('parts.message')
                <div class="flex">
                    @include('parts.menu.admin-panel-nav')
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
    @include('parts.footer')
</html>