<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected $_admin;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_admin = Admin::query();
            return $next($request);
        })
        ->except(['create']);
    }

    /**
     *　管理者一覧
     */
    public function index()
    {
        return view('master.admin.index', [
            'admins' => $this->_admin->latest()->paginate(10)
        ]);
    }

    /**
     *　管理者作成
     */
    public function create()
    {
        return view('master.admin.create');
    }

    /**
     *　管理者登録
     */
    public function store(AdminRequest $request)
    {
        try {
            $params = $request->input();
            $params["master_id"] = auth()->user('master')->id;

            DB::transaction(function () use ($params) {
                return $this->_admin->create($params);
            });

            return redirect()->route('master.admin.index')->with([
                'alert' => [
                    'message' => '管理者登録が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception  $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　管理者詳細
     */
    public function show(Request $request)
    {
        return view('master.admin.show', [
            'admin' => $this->_admin->findOrFail($request->admin)
        ]);
    }

    /**
     *　管理者編集
     */
    public function edit(Request $request)
    {
        return view('master.admin.edit', [
            'admin' => $this->_admin->findOrFail($request->admin)
        ]);
    }

    /**
     *　管理者更新
     */
    public function update(AdminRequest $request)
    {
        try {
            $params = $request->filled('password') ? $request->input() : $request->except('password');

            DB::transaction(function () use ($params, $request) {
                $this->_admin->findOrFail($request->admin)->fill($params)->update();
            });

            return redirect()->route('master.admin.index')->with([
                'alert' => [
                    'message' => '管理者編集が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception  $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　管理者削除
     */
    public function destroy(Request $request)
    {
        try {
            DB::transaction(function () use($request) {
                $this->_admin->findOrFail($request->admin)->delete();
            });

            return redirect()->route('master.admin.index')->with([
                'alert' => [
                    'message' => '管理者の削除が完了しました。',
                    'type' => 'danger'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }
}
