<footer class="bg-[#0f172a] dark:bg-[#070b14] text-white mt-24">
    <div class="h-1 w-full bg-brand" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 py-12">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 mb-10">

            {{-- Brand --}}
            <div class="col-span-2 sm:col-span-1">
                <a href="{{ url('/') }}" class="inline-block font-display font-bold text-lg mb-3">{{ config('app.name', 'Laravel') }}</a>
                <p class="text-white/70 text-sm leading-relaxed">
                    A starter application built on the TALL stack. Replace this copy with your own.
                </p>
            </div>

            {{-- Example link columns — edit to taste --}}
            @foreach ([
                'Product'  => [['Features', '#'], ['Pricing', '#'], ['Docs', 'https://laravel.com/docs']],
                'Company'  => [['About', '#'], ['Blog', '#'], ['Contact', '#']],
                'Account'  => [['Admin', url('/admin')], ['Sign in', url('/admin/login')]],
            ] as $heading => $items)
                <div>
                    <h3 class="font-display font-semibold text-sm mb-4 uppercase tracking-wider">{{ $heading }}</h3>
                    <ul class="space-y-3">
                        @foreach ($items as [$label, $href])
                            <li><a href="{{ $href }}" class="text-sm text-white/60 hover:text-white transition-colors">{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-white/40 text-xs text-center sm:text-left">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
            <a href="#" class="text-white/40 text-xs hover:text-white/60 transition-colors">Privacy Policy</a>
        </div>
    </div>
</footer>
