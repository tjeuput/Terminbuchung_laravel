<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    @vite('resources/js/app.js')
    <title>Blog - {{$title ?? 'Online-Termin-Management'}}</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="min-h-full">

    <x-navbar></x-navbar>
    <header>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-black-900">Termin online buchen</h1>

        </div>
    </header>


    <main></main>




</div>
</body>
</html>
