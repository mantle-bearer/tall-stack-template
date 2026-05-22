<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Tell Laravel that the "public" directory is HERE (the subdomain root),
// not inside laravel/public/ which doesn't exist in this deploy layout.
define('APP_PUBLIC_PATH', __DIR__);

if (file_exists($maintenance = __DIR__.'/laravel/storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/laravel/vendor/autoload.php';

(require_once __DIR__.'/laravel/bootstrap/app.php')
    ->handleRequest(Request::capture());
