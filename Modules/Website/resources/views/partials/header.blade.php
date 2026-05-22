{{-- Site header. Alpine state lives on the outer wrapper so the mobile drawer
     and backdrop are siblings of <header> and aren't clipped by it. --}}
<div
    x-data="{
        scrolled: false,
        open: false,
        init() {
            this.$watch('open', val => { document.body.style.overflow = val ? 'hidden' : ''; });
        },
        toggleTheme() {
            const dark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', dark ? 'dark' : 'light');
        }
    }"
    x-on:scroll.window="scrolled = window.scrollY > 20">

@php($links = [['Home', url('/')], ['Admin', url('/admin')]])

<header
    :class="scrolled ? 'bg-white/90 dark:bg-[#0b0f1a]/90 backdrop-blur-md shadow-sm' : 'bg-transparent'"
    class="fixed inset-x-0 top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12">
        <div class="flex items-center h-14 sm:h-16 lg:h-[4.5rem]">

            {{-- Brand — far left --}}
            <a href="{{ url('/') }}" class="flex-shrink-0 mr-auto font-display font-bold text-lg tracking-tight hover:text-brand transition-colors">
                {{ config('app.name', 'Laravel') }}
            </a>

            {{-- Nav links — center (desktop) --}}
            <nav class="hidden lg:flex items-center gap-1 absolute left-1/2 -translate-x-1/2" aria-label="Main navigation">
                @foreach ($links as [$label, $href])
                    <a href="{{ $href }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-medium hover:bg-brand/10 hover:text-brand transition-colors">{{ $label }}</a>
                @endforeach
            </nav>

            {{-- Right: dark-mode toggle + hamburger --}}
            <div class="flex items-center gap-1.5 ml-auto">
                <button @click="toggleTheme()"
                        class="p-2 rounded-lg text-[var(--color-text2)] hover:bg-brand/10 hover:text-brand transition-colors focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2"
                        aria-label="Toggle dark mode">
                    <svg class="theme-icon-sun w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364-.707-.707M6.343 6.343l-.707-.707m12.728 0-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/></svg>
                    <svg class="theme-icon-moon w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>

                <button @click="open = !open" :aria-expanded="open.toString()" aria-controls="mobile-menu" aria-label="Toggle menu"
                        class="lg:hidden p-2 rounded-lg text-[var(--color-text2)] hover:bg-brand/10 transition-colors focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2">
                    <svg x-show="!open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" style="display:none" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </div>
</header>

{{-- Mobile drawer (sibling of header) --}}
<div x-show="open" x-cloak x-transition.opacity @click="open = false"
     class="lg:hidden fixed inset-0 z-40 bg-black/50 backdrop-blur-sm" aria-hidden="true"></div>

<div id="mobile-menu" x-show="open" x-cloak
     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
     class="lg:hidden fixed top-0 right-0 bottom-0 z-50 w-[85vw] max-w-xs bg-[var(--color-bg)] dark:bg-[#0b0f1a] shadow-2xl flex flex-col">
    <div class="flex items-center justify-between px-5 h-14 sm:h-16 border-b border-black/10 dark:border-white/10">
        <span class="font-display font-bold text-lg tracking-tight">{{ config('app.name', 'Laravel') }}</span>
        <button @click="open = false" class="p-2 rounded-lg hover:bg-brand/10 hover:text-brand transition-colors" aria-label="Close menu">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    <nav class="flex-1 overflow-y-auto px-3 py-3 space-y-0.5" aria-label="Mobile navigation">
        @foreach ($links as [$label, $href])
            <a href="{{ $href }}" @click="open = false"
               class="flex items-center px-4 py-3 rounded-xl text-sm font-semibold hover:bg-brand/10 hover:text-brand transition-colors">{{ $label }}</a>
        @endforeach
    </nav>
</div>

</div>{{-- /x-data wrapper --}}
