<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Link Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-gray-900 bg-red antialiased font-poppins">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-b from-purple-950 to-slate-950 bg-repeat">
            <div>
                <a href="/">
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                    {{-- <img src="img/konekin-bulat.png" alt="" width="41" height="41" class="d-inline-block align-text-top"><h4 class="d-inline-block align-text-top ms-2 mt-1"> --}}
                </a>
            </div>

            <div class="w-full sm:max-w-lg lg:max-w-2xl px-9 py-9 hover:shadow-purple-900 shadow-2xl bg-purple-950 border border-1 rounded-md">
                {{ $slot }}
            </div>
        </div>
    </body>

</html>
