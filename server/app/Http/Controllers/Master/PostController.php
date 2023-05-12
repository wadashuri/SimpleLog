<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


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

            $this->postImage($request);

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

            $this->postImage($request);

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

    # 画像アップロード
    private function uploadPublicImage($images, $targetDir, $postId, $type)
    {
        $postsDir = $targetDir . '/' . $postId;
        $fileName = $type . '.png';
        $disk = Storage::disk('local');

        $disk->makeDirectory($postsDir);

        $imagesPath = $disk->putFileAs('public/' . $postsDir, $images, $fileName);
        // インスタンスを作成
        $image = Image::make($disk->path($imagesPath));
        // ここでリサイズを行う
        $width = 300;
        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // 回転を補正して保存
        $image->orientate()->save();
        // 一次ファイル削除
        $image->destroy();
        return $disk->url($imagesPath);
    }

    /**
     * 画像登録関数
     */
    private function postImage($request)
    {
        # oemファイル
        $post_image = $request->file('post_image');

        # post_imageあり
        if ($post_image) {
            $this->uploadPublicImage($post_image, 'post', $request->post, 'image');
        }
    }
}
