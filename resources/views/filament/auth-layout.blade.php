@php
    $livewire ??= null;
    $authHeading    = $livewire?->getHeading()    ?: 'Welcome Back!';
    $authSubheading = $livewire?->getSubHeading() ?: 'Sign in with your credentials';
@endphp

@push('styles')
    {{--
        Login polish, scoped to .fi-auth. The admin panel can boot in dark mode
        (<html class="dark">), which would otherwise render the form's labels as
        white text and the inputs as faint white rings — invisible on this white
        card. These rules pin the card to a light, branded look in both themes,
        give the inputs real bordered boxes (taller fields) and enlarge the
        submit button. Brand accents reference Filament's --primary-* variables,
        so they always match the panel's primary colour — the template brand
        indigo (--color-brand in resources/css/app.css). Neutrals use the
        template's slate palette (--color-text #0f172a, --color-textm #94a3b8).
    --}}
    <style>
        /* Autofill: keep a white field with dark text. */
        .fi-auth input:-webkit-autofill,
        .fi-auth input:-webkit-autofill:hover,
        .fi-auth input:-webkit-autofill:focus,
        .fi-auth input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px #ffffff inset !important;
            -webkit-text-fill-color: #0f172a !important;
            caret-color: #0f172a !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Field labels — forced visible (would be white in dark mode). */
        .fi-auth .fi-fo-field-wrp-label span {
            color: #334155 !important;
            font-weight: 500 !important;
            font-size: 0.8125rem !important;
        }

        /* Input wrapper — a real border instead of Tailwind's box-shadow ring. */
        .fi-auth .fi-input-wrp {
            border-radius: 0.625rem !important;
            background-color: #ffffff !important;
            border: 1px solid rgba(15, 23, 42, 0.12) !important;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04) !important;
            --tw-ring-shadow: 0 0 #0000 !important;
            --tw-ring-offset-shadow: 0 0 #0000 !important;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }
        .fi-auth .fi-input-wrp:focus-within {
            border-color: rgb(var(--primary-600)) !important;
            box-shadow: 0 0 0 3px rgba(var(--primary-500), 0.15),
                        0 1px 2px rgba(var(--primary-500), 0.05) !important;
        }
        .fi-auth .fi-input {
            padding-top: 0.875rem !important;
            padding-bottom: 0.875rem !important;
            font-size: 0.9375rem !important;
            color: #0f172a !important;
            background-color: transparent !important;
        }
        .fi-auth .fi-input::placeholder {
            color: #94a3b8 !important;
        }
        .fi-auth .fi-input-wrp-suffix .fi-icon-btn {
            color: #64748b !important;
        }
        .fi-auth .fi-input-wrp-suffix .fi-icon-btn:hover {
            color: rgb(var(--primary-600)) !important;
        }

        /* Checkbox (Remember me) — visible border, brand colour when checked. */
        .fi-auth input[type="checkbox"] {
            width: 1.125rem !important;
            height: 1.125rem !important;
            border: 1.5px solid rgba(15, 23, 42, 0.25) !important;
            border-radius: 0.3125rem !important;
            background-color: #ffffff !important;
            box-shadow: none !important;
            --tw-ring-shadow: 0 0 #0000 !important;
            --tw-ring-offset-shadow: 0 0 #0000 !important;
            cursor: pointer !important;
        }
        .fi-auth input[type="checkbox"]:hover {
            border-color: rgba(15, 23, 42, 0.4) !important;
        }
        .fi-auth input[type="checkbox"]:checked {
            background-color: rgb(var(--primary-600)) !important;
            border-color: rgb(var(--primary-600)) !important;
        }
        .fi-auth input[type="checkbox"]:focus,
        .fi-auth input[type="checkbox"]:focus-visible {
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(var(--primary-500), 0.18) !important;
        }

        /* Form rhythm + bigger submit button. */
        .fi-auth .fi-form {
            row-gap: 1.125rem !important;
        }
        .fi-auth .fi-form-actions {
            margin-top: 0.75rem;
        }
        .fi-auth .fi-form-actions .fi-btn {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
            font-size: 0.9375rem !important;
            font-weight: 600 !important;
            border-radius: 0.625rem !important;
            box-shadow: 0 1px 2px rgba(var(--primary-500), 0.20),
                        0 4px 12px rgba(var(--primary-500), 0.18) !important;
        }

        /* Mobile: tighter card + smaller header. */
        @media (max-width: 480px) {
            .fi-auth .auth-card-inner { padding: 1.5rem 1.25rem !important; }
            .fi-auth .auth-heading    { font-size: 1.375rem !important; }
            .fi-auth .auth-subheading { font-size: 0.875rem !important; }
            .fi-auth .auth-logo       { height: 2.5rem !important; }
        }

        /* Tablet and up: roomier card padding. */
        @media (min-width: 640px) {
            .fi-auth .auth-card-inner { padding: 2.5rem 2.5rem !important; }
            .fi-auth .auth-heading    { font-size: 1.75rem !important; }
        }
    </style>
@endpush

<x-filament-panels::layout.base :livewire="$livewire">
    <div class="fi-auth relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-8 sm:py-12"
         style="background-color:#f8fafc;">

        {{-- Very subtle brand grid on the background --}}
        <svg class="pointer-events-none absolute inset-0 h-full w-full"
             aria-hidden="true"
             xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="bg-minor" width="20" height="20" patternUnits="userSpaceOnUse">
                    <path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(79,70,229,.05)" stroke-width="0.5"/>
                </pattern>
                <pattern id="bg-major" width="100" height="100" patternUnits="userSpaceOnUse">
                    <rect width="100" height="100" fill="url(#bg-minor)"/>
                    <path d="M 100 0 L 0 0 0 100" fill="none" stroke="rgba(79,70,229,.08)" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#bg-major)"/>
        </svg>

        {{-- Login card --}}
        <div class="auth-card relative z-10 w-full"
             style="max-width:26rem;
                    background:#ffffff;
                    border-radius:1rem;
                    border:1px solid rgba(15,23,42,.06);
                    box-shadow:0 1px 3px rgba(15,23,42,.05),0 8px 24px rgba(15,23,42,.08);">

            <div class="auth-card-inner" style="padding:1.75rem 1.5rem;">

                {{-- Card header: heading left, logo right --}}
                <div class="auth-header"
                     style="display:flex; align-items:flex-start; justify-content:space-between;
                            gap:.75rem; margin-bottom:1.75rem;">
                    <div style="min-width:0;">
                        <h1 class="auth-heading"
                            style="font-family:'IBM Plex Sans',system-ui,sans-serif;
                                   font-size:1.625rem; font-weight:700; color:#0f172a;
                                   line-height:1.2; letter-spacing:-0.015em; margin:0 0 .5rem;">
                            {{ $authHeading }}
                        </h1>
                        <p class="auth-subheading"
                           style="font-family:'IBM Plex Sans',system-ui,sans-serif;
                                  font-size:.9375rem; color:#64748b; margin:0; line-height:1.4;">
                            {{ $authSubheading }}
                        </p>
                    </div>
                    <img class="auth-logo"
                         src="{{ asset('images/logo.png') }}"
                         alt="{{ filament()->getBrandName() }}"
                         style="height:3rem; width:auto; object-fit:contain; flex-shrink:0;">
                </div>

                {{-- Form --}}
                {{ $slot }}

            </div>
        </div>
    </div>
</x-filament-panels::layout.base>
