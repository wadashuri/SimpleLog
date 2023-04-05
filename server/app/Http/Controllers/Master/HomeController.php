<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $master = auth()->user();
        return view('master.home', compact('master'));
    }
}
