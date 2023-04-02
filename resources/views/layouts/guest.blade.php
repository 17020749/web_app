<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .background{
                background-image: url('/images/logo.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                
            }
            </style>
    </head>
    <body class="font-sans text-gray-900 antialiased ">
        <div class="min-h-screen flex  sm:justify-center  justify-center pt-6 sm:pt-0 bg-gray-100 background">
            <div class="w-full sm:max-w-md px-6 py-4 mt-32 bg-white shadow-md overflow-hidden sm:rounded-lg h-1/2">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
