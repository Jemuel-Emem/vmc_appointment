<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DSMS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=montserrat:400,600,700|poppins:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased relative bg-gray-100">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-25 z-[-1]" style="background-image: url('{{ asset('images/vmcbg.png') }}');"></div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="text-center">
                <a href="/" wire:navigate>
                    <img src="{{ asset('images/icon_vmc.png') }}" alt="" class="w-20 h-20">
                </a>

                <!-- Improved DSMS -->
                <h1 class="font-bold text-3xl sm:text-4xl mt-2 text-gray-800 tracking-wide" style="font-family: 'Montserrat', sans-serif;">
                    DSMS
                </h1>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
