<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {

        $admin = $request->user();
        return view('admin.subscription.index')->with([
            'intent' => $admin->createSetupIntent()
        ]);
    }
}
