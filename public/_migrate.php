<?php
/**
 * Lightweight deploy migration endpoint.
 * Usage: https://your-domain.example/_migrate.php?token=YOUR_TOKEN_HERE
 *
 * Security: requires `app.deploy_token` (config/app.php) to be set on the server
 * to the same secret value. The file compares the token using hash_equals.
 */

define('LARAVEL_START', microtime(true));
define('APP_PUBLIC_PATH', __DIR__);

// Adjust these paths if your deploy layout is different. In the preview deploy
// layout the Laravel app lives in the `laravel/` sibling folder next to this file.
$vendorAutoload = __DIR__ . '/laravel/vendor/autoload.php';
$bootstrapApp  = __DIR__ . '/laravel/bootstrap/app.php';

if (! file_exists($vendorAutoload) || ! file_exists($bootstrapApp)) {
    http_response_code(500);
    echo 'Bootstrap files not found. Ensure this script is deployed to the site root alongside the `laravel/` folder.';
    exit;
}

require $vendorAutoload;
$app = require_once $bootstrapApp;

// Get configured token
$configured = (string) $app['config']->get('app.deploy_token', '');
if ($configured === '') {
    http_response_code(503);
    echo 'Deploy token not configured on server.';
    exit;
}

// Token may be supplied either via `token` query param or `X-Deploy-Token` header.
$provided = (string) ($_GET['token'] ?? ($_SERVER['HTTP_X_DEPLOY_TOKEN'] ?? ''));

if (! hash_equals($configured, $provided)) {
    http_response_code(403);
    echo 'Forbidden: invalid token.';
    exit;
}

// Run migrations via the Console Kernel to ensure proper environment.
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->call('migrate', ['--force' => true, '--no-interaction' => true]);
$output = $kernel->output();

// Basic JSON-friendly response for machines, and plain text for browsers.
header('Content-Type: text/plain; charset=utf-8');
echo "MIGRATE EXIT CODE: {$status}\n";
echo "---- OUTPUT ----\n";
echo $output;

$app->terminate();

exit((int) $status);
