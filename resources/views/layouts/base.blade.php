<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link
        href="{{ url(asset('favicon.ico')) }}"
        rel="shortcut icon"
    >

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    <!-- CSRF Token -->
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <!-- Scripts -->
    @wireUiScripts

</head>

<body class="min-w-full overflow-visible prose">
    <livewire:mobile-navbar />
    <div class="flex flex-row">
        <livewire:navbar />
        <div class="px-6 grow sm:px-12 sm:pt-36">
            <div class="max-w-3xl m-auto">
                @yield('body')
            </div>
        </div>
    </div>
</body>

</html>
