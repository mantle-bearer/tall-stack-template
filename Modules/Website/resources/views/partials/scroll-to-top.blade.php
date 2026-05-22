{{--
    Scroll-to-top button.
    Already included in layouts/app.blade.php — Alpine (bundled with Livewire)
    handles visibility + click.
--}}
<div
    x-data="{ visible: false }"
    x-on:scroll.window="visible = window.scrollY > 320"
    class="fixed bottom-6 right-6 z-40"
    aria-live="polite">
    <button
        x-show="visible"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-3 scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-3 scale-90"
        x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        aria-label="Scroll back to top"
        class="w-11 h-11 rounded-xl flex items-center justify-center bg-brand hover:bg-brand-dark active:scale-95 transition-all shadow-lg focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2">
        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
        </svg>
    </button>
</div>
