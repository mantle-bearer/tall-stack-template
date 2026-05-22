@extends('website::layouts.app')

@section('title', 'Session Expired · ' . config('app.name', 'Laravel'))
@section('description', 'Your session has expired. Please refresh and try again.')

@section('content')
<section class="min-h-screen flex flex-col items-center justify-center text-center px-6 py-24">
    <p class="font-display font-extrabold text-brand leading-none" style="font-size: clamp(4.5rem, 12vw, 6.5rem);">419</p>
    <h1 class="font-display font-bold text-xl sm:text-2xl mt-4">Session expired</h1>
    <p class="text-sm text-[var(--color-text2)] dark:text-slate-400 mt-3 max-w-xs">
        Your session timed out for security. Please go back and try again.
    </p>
    <a href="{{ url()->previous() !== url()->current() ? url()->previous() : url('/') }}"
       onclick="history.back(); return false;"
       class="mt-8 inline-flex items-center gap-2 px-7 py-3.5 rounded-xl text-sm font-semibold bg-brand text-white hover:bg-brand-dark transition-all hover:-translate-y-px focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2">
        Go back
    </a>
</section>
@endsection
