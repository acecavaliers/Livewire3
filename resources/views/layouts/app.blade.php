<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <div class="flex overflow-hidden bg-gray-100 pt-12">
                @include('layouts.partials.sidebar')
                <div id="main-content" class="h-full w-full bg-gray-100 relative overflow-y-auto lg:ml-64">
                    <!-- Page Content -->
                    <main>
                        <div class="pt-6 px-4">
                            {{ $slot }}
                        </div>
                    </main>
                </div>

            </div>
        </div>

        @stack('modals')

        @livewireScripts

        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>

    </body>
</html>
