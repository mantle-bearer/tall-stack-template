<?php

use Illuminate\Support\Facades\Route;
use Modules\Website\Http\Controllers\HomeController;

Route::get('/', HomeController::class)->name('home');
