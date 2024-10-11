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

    <style>
        .background-overlay {
            position: relative;
            width: 100%;
            height: 100vh;
            background-image: url('{{ asset('img/CHED Background Overlay_A.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .background-overlay::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, rgba(216, 175, 0, 0.7), rgba(0, 50, 160, 0.7)); /* Blue to Yellow gradient */
            z-index: 1;
        }



        .content-container {
            position: relative;
            z-index: 2;
            color: #fff; /* Change text color to white for better contrast */
        }
    </style>
</head>
<body>
    <div class="background-overlay">
        <div class="font-sans text-gray-900 antialiased content-container">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>
</html>
