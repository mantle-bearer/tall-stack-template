<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

// Home route is handled by Modules\Website — see Modules/Website/routes/web.php

// Deploy hook — runs migrations on demand from GitHub Actions.
// Authenticated by a shared secret in the X-Deploy-Token header.
Route::post('/_deploy/migrate', function (Request $request) {
    $token = (string) config('app.deploy_token');

    abort_if($token === '', 503, 'Deploy token not configured.');
    abort_unless(hash_equals($token, (string) $request->header('X-Deploy-Token', '')), 403);

    $exit   = Artisan::call('migrate', ['--force' => true, '--no-interaction' => true]);
    $output = trim(Artisan::output());

    Log::info('Deploy migrate', ['exit_code' => $exit, 'output' => $output]);

    return response()->json([
        'ok'        => $exit === 0,
        'exit_code' => $exit,
        'output'    => $output,
    ], $exit === 0 ? 200 : 500);
})->name('deploy.migrate');
