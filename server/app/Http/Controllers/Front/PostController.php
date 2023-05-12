<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    protected $_post;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_post = Post::query();
            return $next($request);
        });
    }

    public function index()
    {
        return view('front.post.index', [
            'posts' => $this->_post->latest()->paginate(9)
        ]);
    }

    public function show()
    {
        return view('front.post.show', [
            'post' => $this->_post->findOrFail(request()->route('post'))
        ]);
    }
}
