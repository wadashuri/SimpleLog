<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(Request $request)
    {
        return view('front.work.index', [
            'works' => Post::latest()->with(['categories'])
                ->where(function ($query) {
                    $query->whereHas('categories', function ($q) {
                        $q->where('name', 'LIKE', '%' . '事業内容' . '%');
                    });
                })->get(),
        ]);
    }
}
