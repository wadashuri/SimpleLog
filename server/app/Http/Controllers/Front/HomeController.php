<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $post_query = Post::latest()->with(['categories']);
        return view('front.home', [
            'posts' => $post_query->take(5)->get(),
            'works' => $post_query->where(function ($query) {
                $query->whereHas('categories', function ($q) {
                    $q->where('name', 'LIKE', '%' . '事業内容' . '%');
                });
            })->get(),
        ]);
    }
}
