<?php

namespace Modules\Website\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('website::home');
    }
}
