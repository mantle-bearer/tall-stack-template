<?php

namespace App\Filament\Pages\Auth;

use Filament\Actions\Action;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    /**
     * @var view-string
     */
    protected static string $view = 'filament.pages.auth.login';

    /**
     * Custom auth chrome (centred card, engineering-grid background, logo) lives
     * in this layout; the page view above only renders the form into its slot.
     */
    protected static string $layout = 'filament.auth-layout';

    public function getHeading(): string
    {
        return 'Welcome Back!';
    }

    public function getSubheading(): string
    {
        return 'Sign in with your credentials';
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label(__('filament-panels::pages/auth/login.form.email.label'))
            ->placeholder('Enter your email address')
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getPasswordFormComponent(): Component
    {
        // No inline "forgot password" hint here — it lives in the design's
        // clean layout; password reset is still reachable via its own route.
        return TextInput::make('password')
            ->label(__('filament-panels::pages/auth/login.form.password.label'))
            ->placeholder('Enter your password')
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->autocomplete('current-password')
            ->required()
            ->extraInputAttributes(['tabindex' => 2]);
    }

    protected function getAuthenticateFormAction(): Action
    {
        return parent::getAuthenticateFormAction()->label('Log in');
    }
}
