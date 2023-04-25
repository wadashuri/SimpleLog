<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_user = auth()->user('admin')->users();
            return $next($request);
        })
        ->except(['create']);
    }

    /**
     *　ユーザー一覧
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => $this->_user->latest()->paginate(10)
        ]);
    }

    /**
     *　ユーザー作成
     */
    public function create()
    {
        return view('admin.user.create',[
            'groups' => auth()->user('admin')->groups()->latest()->get(),
        ]);
    }

    /**
     *　ユーザー登録
     */
    public function store(UserRequest $request)
    {
        try {
            $params = $request->input();
            # プロ以外は権限固定
            if(!auth()->user()->can('pro')){
                $params['administrator'] = 1;
            }

            DB::transaction(function () use ($params) {
                $user = $this->_user->create($params);

                if (!empty($params['groups'])) {
                    $user->groups()->attach($params['groups']);
                }
            });

            return redirect()->route('admin.user.index')->with([
                'alert' => [
                    'message' => 'ユーザー登録が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception  $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　ユーザー詳細
     */
    public function show(Request $request)
    {
        return view('admin.user.show', [
            'user' => $this->_user->findOrFail($request->user)
        ]);
    }

    /**
     *　ユーザー編集
     */
    public function edit(Request $request)
    {
        return view('admin.user.edit', [
            'user' => $this->_user->findOrFail($request->user),
            'groups' => auth()->user('admin')->groups()->get(),
        ]);
    }

    /**
     *　ユーザー更新
     */
    public function update(UserRequest $request)
    {
        try {
            $params = $request->filled('password') ? $request->input() : $request->except('password');

            DB::transaction(function () use ($params, $request) {
                $this->_user->findOrFail($request->user)->fill($params)->update();
                $this->_user->findOrFail($request->user)->groups()->sync($params['groups'] ?? []);
            });

            return redirect()->route('admin.user.index')->with([
                'alert' => [
                    'message' => 'ユーザー編集が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception  $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　ユーザー削除
     */
    public function destroy(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->_user->findOrFail($request->user)->delete();
            });

            return redirect()->route('admin.user.index')->with([
                'alert' => [
                    'message' => 'ユーザーの削除が完了しました。',
                    'type' => 'danger'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }
}
