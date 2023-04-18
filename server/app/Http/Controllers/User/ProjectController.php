<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    protected $_project;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_project = auth()->user()->admin->projects();
            return $next($request);
        });
    }

    /**
     *　プロジェクト一覧
     */
    public function index(Request $request)
    {
        $admin = auth()->user()->admin;

        # プロジェクトのコレクションを取得
        $projects = $this->_project->searchProject($request)->get();
        # 各プロジェクトの生産性を合計する変数を初期化
        $total_productivity = 0;
        // 各プロジェクトの生産性を合計に加算
        foreach ($projects as $project) {
            // プロジェクトの生産性を計算
            $productivity = $project->productivity();

            // 生産性を合計に加算
            $total_productivity += $productivity;
        }

        return view('user.project.index', [
            'users' => $admin->users()->pluck('name', 'id'),
            'customers' => $admin->customers()->pluck('name', 'id'),
            'projects' => $admin->projects()->with(['admin','customer'])->searchProject($request)->latest()->paginate("10"),
            'sum_gross_profit' => $admin->projects()->searchProject($request)->sum('gross_profit'),
            'total_productivity' => $total_productivity,
        ]);
    }

    /**
     *　プロジェクト作成
     */
    public function create()
    {
        return view('user.project.create', [
            'customers' => auth()->user()->admin->customers()->latest()->pluck('name', 'id'),
            'all_projects' => auth()->user()->admin->projects()->latest()->get(),
        ]);
    }

    /**
     *　プロジェクト登録
     */
    public function store(ProjectRequest $request)
    {
        try {
            $params = $request->input();
            $params['admin_id'] = auth()->user()->admin->id;

            DB::transaction(function () use ($params) {
                $this->_project->create($params);
            });

            return redirect()->route('user.project.index')->with([
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
        return view('user.project.show', [
            'project' => $this->_project->findOrFail(request()->route('project'))
        ]);
    }

    /**
     *　プロジェクト編集
     */
    public function edit()
    {
        return view('user.project.edit', [
            'project' => $this->_project->findOrFail(request()->route('project')),
            'customers' => auth()->user()->admin->customers()->latest()->pluck('name', 'id'),
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

            return redirect()->route('user.project.edit', $this->_project->findOrFail(request()->route('project')))->with([
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

            return redirect()->route('user.project.index')->with([
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
