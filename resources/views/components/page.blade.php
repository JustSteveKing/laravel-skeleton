@props([
    'title' => config('app.name'),
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    @stack('meta')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <livewire:styles />
</head>
<body class="min-h-full antialiased font-sans bg-white dark:bg-black text-black dark:text-white">
    <header x-data="{ open: false }" @keydown.window.escape="open = false" class="sticky inset-x-0 top-0 z-50">
        header
    </header>

    <main>
        {{ $slot }}
    </main>

    <livewire:scripts />
</body>
</html>
