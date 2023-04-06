<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    protected $_project;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_project = auth()->user('admin')->projects();
            return $next($request);
        });
    }

    /**
     *　プロジェクト一覧
     */
    public function index(Request $request)
    {
        $admin = auth()->user('admin');
        return view('admin.project.index', [
            'users' => $admin->users()->pluck('name', 'id'),
            'customers' => $admin->customers()->pluck('name', 'id'),
            'projects' => $admin->projects()->with(['admin','customer'])->searchProject($request)->latest()->paginate("10"),
            'sum_cost' => $admin->projects()->searchProject($request)->sum('cost')
        ]);
    }

    /**
     *　プロジェクト作成
     */
    public function create()
    {
        return view('admin.project.create', [
            'customers' => auth()->user('admin')->customers()->latest()->pluck('name', 'id'),
            'all_projects' => auth()->user('admin')->projects()->latest()->get(),
        ]);
    }

    /**
     *　プロジェクト登録
     */
    public function store(ProjectRequest $request)
    {
        try {
            $params = $request->input();
            $params['admin_id'] = auth()->user('admin')->id;

            DB::transaction(function () use ($params) {
                $this->_project->create($params);
            });

            return redirect()->route('admin.project.index')->with([
                'alert' => [
                    'message' => 'プロジェクト登録が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception  $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　プロジェクト詳細
     */
    public function show()
    {
        return view('admin.project.show', [
            'project' => $this->_project->findOrFail(request()->route('project'))
        ]);
    }

    /**
     *　プロジェクト編集
     */
    public function edit()
    {
        return view('admin.project.edit', [
            'project' => $this->_project->findOrFail(request()->route('project')),
            'customers' => auth()->user('admin')->customers()->latest()->pluck('name', 'id'),
        ]);
    }

    /**
     *　プロジェクト更新
     */
    public function update(ProjectRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $this->_project->findOrFail(request()->route('project'))->fill($params)->update();
            });

            return redirect()->route('admin.project.edit', $this->_project->findOrFail(request()->route('project')))->with([
                'alert' => [
                    'message' => 'プロジェクトの編集が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　プロジェクト削除
     */
    public function destroy()
    {
        try {
            DB::transaction(function () {
                $this->_project->findOrFail(request()->route('project'))->delete();
            });

            return redirect()->route('admin.project.index')->with([
                'alert' => [
                    'message' => 'プロジェクトの削除が完了しました。',
                    'type' => 'danger'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }
}
