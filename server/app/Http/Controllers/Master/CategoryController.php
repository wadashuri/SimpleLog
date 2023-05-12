<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $_category;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_category = auth()->user('master')->categories();
            return $next($request);
        });
    }


    /**
     *　カテゴリー作成
     */
    public function create()
    {
        return view('master.category.create', [
            'categories' => $this->_category->latest()->paginate(10)
        ]);
    }

    /**
     *　カテゴリー登録
     */
    public function store(CategoryRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $this->_category->create($params);
            });

            return redirect()->route('master.category.create')->with([
                'alert' => [
                    'message' => 'カテゴリーの登録が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　カテゴリー更新
     */
    public function update(CategoryRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $this->_category->findOrFail(request()->route('category'))->fill($params)->update();
            });

            return redirect()->route('master.category.create')->with([
                'alert' => [
                    'message' => 'カテゴリーの編集が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　カテゴリー削除
     */
    public function destroy()
    {
        try {
            DB::transaction(function () {
                $this->_category->findOrFail(request()->route('category'))->delete();
            });

            return redirect()->route('master.category.create')->with([
                'alert' => [
                    'message' => 'カテゴリーの削除が完了しました。',
                    'type' => 'danger'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }
}
