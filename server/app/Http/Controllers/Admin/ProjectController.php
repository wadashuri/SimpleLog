<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
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

        return view('admin.project.index', [
            'users' => $admin->users()->pluck('name', 'id'),
            'customers' => $admin->customers()->pluck('name', 'id'),
            'projects' => $this->_project->with(['admin','customer'])->searchProject($request)->latest()->paginate("10"),
            'sum_gross_profit' => $this->_project->searchProject($request)->sum('gross_profit'),
            'total_productivity' => $total_productivity,
        ]);
    }

    /**
     *　プロジェクト作成
     */
    public function create()
    {
        return view('admin.project.create', [
            'customers' => auth()->user('admin')->customers()->latest()->pluck('name', 'id'),
            'all_projects' => $this->_project->latest()->get(),
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

    /**
     * csvエクスポート
     */
    public function exportCsv(Request $request)
    {
        if (auth()->user()->can('pro') || auth()->user()->can('premium')) {
        return new StreamedResponse(function () use ($request) {
            $stream = fopen('php://output', 'w');
            //　文字化け回避
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');
            fputcsv($stream, [
                "ID",
                "顧客",
                "顧客担当者",
                "日付"
            ]);
            $projects = $this->_project->with(['admin', 'customer'])->searchProject($request)->latest()->get();
            // プロジェクトごと
            foreach ($projects as $project) {
                    $columns = [
                        $project->id,
                        $project->customer->name ? $project->customer->name : '##',
                        $project->customer_manager ? $project->customer_manager : '##',
                        $project->date ? $project->date : '##',
                    ];
                    fputcsv($stream, $columns);
                }

            fclose($stream);
        }, 200, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => sprintf('attachment; filename="プロジェクト一覧_%s.csv"', date('YmdHi'))
        ]);
    }
    }
}
