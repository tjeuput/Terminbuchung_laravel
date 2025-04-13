<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Arzt-Terminbuchung') }}</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="style.css">
</head>
<body class="antialiased text-gray-800 bg-gray-200">
<div class="min-h-full">

    <x-navbar></x-navbar>
    <header>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-black-900">Termin online buchen</h1>
        </div>
    </header>

    <main class="container mx-auto py-6 px-4">
        @yield('content')
    </main>

</div>




<footer class="py-4 mt-8 border-t">
    <div class="container mx-auto px-4 text-sm text-gray-600 flex ">
        <div>
            <a href="#" class="hover:underline">Impressum</a>
        </div>
        <div class="space-x-4">
            <a href="#" class="hover:underline">Datenschutz</a>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
