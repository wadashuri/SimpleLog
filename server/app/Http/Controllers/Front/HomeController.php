<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Master;
use App\Models\User;
use Laravel\Cashier\Subscription;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {


        // count
        $admin_count = Admin::all()->count();
        $master_count = Master::all()->count();
        $user_count =User::all()->count();
        $subscription_count = Subscription::all()->count();

        // クエリ取得
        $post_query = Post::latest()->with(['categories']);
        return view('front.home', [
            'posts' => $post_query->take(5)->get(),
            'works' => $post_query->where(function ($query) {
                $query->whereHas('categories', function ($q) {
                    $q->where('name', 'LIKE', '%' . '事業内容' . '%');
                });
            })->get(),
            'admin_count' => $admin_count,
            'master_count' => $master_count,
            'user_count' => $user_count,
            'subscription_count' => $subscription_count,
        ]);
    }
}
