@extends('website::layouts.app')

@section('title', 'Page Not Found · ' . config('app.name', 'Laravel'))
@section('description', 'The page you are looking for could not be found.')

@section('content')
<section class="min-h-screen flex flex-col items-center justify-center text-center px-6 py-24">
    <p class="font-display font-extrabold text-brand leading-none" style="font-size: clamp(4.5rem, 12vw, 6.5rem);">404</p>
    <h1 class="font-display font-bold text-xl sm:text-2xl mt-4">Page not found</h1>
    <p class="text-sm text-[var(--color-text2)] dark:text-slate-400 mt-3 max-w-xs">
        The link may be broken or the page may have been removed.
    </p>
    <a href="{{ url('/') }}"
       class="mt-8 inline-flex items-center gap-2 px-7 py-3.5 rounded-xl text-sm font-semibold bg-brand text-white hover:bg-brand-dark transition-all hover:-translate-y-px focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2">
        Back to home
    </a>
</section>
@endsection
