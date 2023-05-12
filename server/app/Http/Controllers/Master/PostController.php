<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    protected $_post;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_post = auth()->user('master')->posts();
            return $next($request);
        })
        ->except(['create']);
    }

    /**
     *　お知らせ一覧
     */
    public function index()
    {
        return view('master.post.index', [
            'posts' => $this->_post->latest()->paginate(10)
        ]);
    }

    /**
     *　お知らせ作成
     */
    public function create()
    {
        return view('master.post.create', [
            'categories' => auth()->user('master')->categories()->latest()->get(),
        ]);
    }

    /**
     *　お知らせ登録
     */
    public function store(PostRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $post = $this->_post->create($params);

                if (!empty($params['categories'])) {
                    $post->categories()->attach($params['categories']);
                }
            });

            return redirect()->route('master.post.index')->with([
                'alert' => [
                    'message' => 'お知らせ登録が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception  $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　お知らせ詳細
     */
    public function show()
    {
        return view('master.post.show', [
            'post' => $this->_post->findOrFail(request()->route('post'))
        ]);
    }

    /**
     *　お知らせ編集
     */
    public function edit()
    {
        return view('master.post.edit', [
            'post' => $this->_post->findOrFail(request()->route('post')),
            'categories' => auth()->user('master')->categories()->get(),
        ]);
    }

    /**
     *　お知らせ更新
     */
    public function update(PostRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $this->_post->findOrFail(request()->route('post'))->fill($params)->update();
                $this->_post->findOrFail(request()->route('post'))->categories()->sync($params['categories'] ?? []);
            });

            return redirect()->route('master.post.index')->with([
                'alert' => [
                    'message' => 'お知らせ編集が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception  $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　お知らせ削除
     */
    public function destroy()
    {
        try {
            DB::transaction(function () {
                $this->_post->findOrFail(request()->route('post'))->delete();
            });

            return redirect()->route('master.post.index')->with([
                'alert' => [
                    'message' => 'お知らせの削除が完了しました。',
                    'type' => 'danger'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }
}
