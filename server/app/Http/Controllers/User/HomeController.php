<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        return view('user.home',compact('user'));
    }
}
