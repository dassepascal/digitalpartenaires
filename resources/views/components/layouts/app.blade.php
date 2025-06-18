<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    {{-- EasyMDE --}}
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">
    {{-- HERO --}}
    {{-- add condition si on est sur la page d'accueil ('/') on affiche le hero sinon ('/blog.index') on affiche le blog-hero --}}

    @if (request()->is('/'))
        <livewire:hero />
    @elseif (request()->routeIs('blog.index'))
        <livewire:blog-hero />
    @endif
    {{-- <livewire:hero /> --}}

    {{-- NAVBAR --}}
    <livewire:navigation.navbar :menus="$menus" />

    {{-- MAIN --}}
    <x-main full-width>

        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit lg:hidden">
            <livewire:navigation.sidebar :menus="$menus" />
        </x-slot:sidebar>

        {{-- SLOT --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>

    </x-main>
    {{--  TOAST area --}}
    {{-- FOOTER --}}
    <hr><br>
    <livewire:navigation.footer />
    <br>
    <x-toast />
    @livewireScripts
</body>

</html>
