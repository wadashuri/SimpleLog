<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $admin = auth()->user();
        return view('admin.home', compact('admin'));
    }
}
