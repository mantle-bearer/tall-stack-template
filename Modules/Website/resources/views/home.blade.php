@extends('website::layouts.app')

@section('title', config('app.name', 'Laravel') . ' — TALL Stack Starter')
@section('description', 'A starter application built on Laravel, Filament, Livewire, Alpine.js and Tailwind CSS.')

@section('content')
    {{-- Hero --}}
    <section class="relative pt-36 pb-24 px-6 sm:px-10 lg:px-12 text-center">
        <div class="max-w-3xl mx-auto" data-animate="fade-up">
            <p class="section-label text-brand mb-4">TALL Stack Starter</p>
            <h1 class="font-display font-extrabold tracking-tight leading-[1.05] text-4xl sm:text-5xl lg:text-6xl">
                Build faster with a clean<br class="hidden sm:block"> {{ config('app.name', 'Laravel') }} foundation
            </h1>
            <p class="mt-6 text-lg text-[var(--color-text2)] dark:text-slate-400 max-w-xl mx-auto">
                Laravel · Filament · Livewire · Alpine.js · Tailwind CSS v4, wired together and ready to extend.
                This is the public landing page — edit it in
                <code class="text-sm">Modules/Website/resources/views/home.blade.php</code>.
            </p>
            <div class="mt-9 flex flex-wrap items-center justify-center gap-3">
                <a href="{{ url('/admin') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold bg-brand text-white hover:bg-brand-dark transition-all hover:-translate-y-px focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2">
                    Open admin panel
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                <a href="https://laravel.com/docs" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold border border-black/15 dark:border-white/15 hover:border-brand hover:text-brand transition-colors">
                    Read the docs
                </a>
            </div>
        </div>
    </section>

    {{-- Feature grid --}}
    <section class="max-w-6xl mx-auto px-6 sm:px-10 lg:px-12 pb-12">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ([
                ['Modular by default', 'Feature code lives in self-contained modules under Modules/ via nwidart/laravel-modules.'],
                ['Filament admin', 'A ready-to-extend admin panel at /admin with database notifications enabled.'],
                ['Livewire + Alpine', 'Reactive components without leaving Blade — Alpine ships bundled with Livewire v3.'],
                ['Tailwind CSS v4', 'CSS-first theming via @theme in resources/css/app.css — no JS config file.'],
                ['Dark mode', 'Class-based dark mode with a no-flash toggle, persisted to localStorage.'],
                ['Deploy-friendly', 'Includes an FTP/cPanel-oriented deploy workflow and an on-demand migrate hook.'],
            ] as $i => [$title, $body])
                <div data-animate="fade-up" data-delay="{{ $i * 80 }}"
                     class="rounded-2xl border border-black/10 dark:border-white/10 bg-[var(--color-bg2)] dark:bg-white/5 p-6">
                    <div class="w-10 h-10 rounded-xl bg-brand/10 text-brand flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg mb-1.5">{{ $title }}</h3>
                    <p class="text-sm text-[var(--color-text2)] dark:text-slate-400 leading-relaxed">{{ $body }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection
