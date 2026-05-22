<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <meta name="description" content="@yield('description', 'A starter app built on the TALL stack.')">

    <meta property="og:title" content="@yield('og_title', config('app.name', 'Laravel'))">
    <meta property="og:description" content="@yield('og_description', 'A starter app built on the TALL stack.')">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">

    {{-- Dark mode: run before any CSS to prevent a flash of the wrong theme --}}
    <script>
    (function(){
        var s=localStorage.getItem('theme');
        var d=window.matchMedia('(prefers-color-scheme:dark)').matches;
        if(s==='dark'||(!s&&d))document.documentElement.classList.add('dark');
    })();
    </script>

    {{-- Google Fonts — swap or remove to match your brand --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=Syne:wght@600;700;800&family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    @stack('head')
</head>
<body class="font-sans antialiased transition-colors duration-200">

    @include('website::partials.header')

    <main>
        @hasSection('content')
            @yield('content')
        @else
            {{ $slot ?? '' }}
        @endif
    </main>

    @include('website::partials.footer')

    @include('website::partials.scroll-to-top')

    @livewireScripts
    @stack('scripts')
</body>
</html>
