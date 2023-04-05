<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{

    protected $_group;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_group = auth()->user('admin')->groups();
            return $next($request);
        });
    }


    /**
     *　グループ作成
     */
    public function create()
    {
        return view('admin.group.create', [
            'groups' => $this->_group->latest()->paginate(10)
        ]);
    }

    /**
     *　グループ登録
     */
    public function store(GroupRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $this->_group->create($params);
            });

            return redirect()->route('admin.group.create')->with([
                'alert' => [
                    'message' => 'グループの登録が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　グループ更新
     */
    public function update(GroupRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $this->_group->findOrFail(request()->route('group'))->fill($params)->update();
            });

            return redirect()->route('admin.group.create')->with([
                'alert' => [
                    'message' => 'グループの編集が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　グループ削除
     */
    public function destroy()
    {
        try {
            DB::transaction(function () {
                $this->_group->findOrFail(request()->route('group'))->delete();
            });

            return redirect()->route('admin.group.create')->with([
                'alert' => [
                    'message' => 'グループの削除が完了しました。',
                    'type' => 'danger'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }
}
