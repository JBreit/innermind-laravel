<?php

namespace Innermind\App\Apis;

use Innermind\Support\Http\Controller;
use Illuminate\Http\Request;

class AppApi extends Controller
{
    protected function dashboard(Request $request)
    {
        return view('app.dashboard');
    }
}