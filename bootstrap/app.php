<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
            'webhooks/paystack',
            '_deploy/*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

// On cPanel deploy the public/ folder lives at the subdomain root, not inside
// laravel/public/. index.php defines APP_PUBLIC_PATH to that root so Vite,
// asset(), and storage:link all resolve correctly.
if (defined('APP_PUBLIC_PATH')) {
    $app->usePublicPath(APP_PUBLIC_PATH);
}

return $app;
