{{--
    Login page view — the form only. The surrounding chrome (centred card,
    engineering-grid background, heading + logo) lives in the custom layout at
    resources/views/filament/auth-layout.blade.php, into whose {{ $slot }} this
    renders. The green button and input focus rings come from the panel's
    `primary` colour (see AdminPanelProvider).
--}}
{{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

<x-filament-panels::form id="form" wire:submit="authenticate">
    {{ $this->form }}

    <x-filament-panels::form.actions
        :actions="$this->getCachedFormActions()"
        :full-width="$this->hasFullWidthFormActions()"
    />
</x-filament-panels::form>

{{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}
