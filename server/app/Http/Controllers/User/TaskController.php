<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;
use App\Constants\StatusConstants;

class TaskController extends Controller
{
    protected $_task;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_task = auth()->user('user')->admin->tasks()->with('project');
            return $next($request);
        });
    }

    /**
     *　タスク一覧
     */
    public function index(Request $request)
    {
        return view('user.task.index', [
            'tasks' => $this->_task->searchTask($request)->latest()->get(),
            'projects' => auth()->user('user')->admin->projects()->pluck('name', 'id')
        ]);
    }


    /**
     *　タスク一覧
     */
    public function get(Request $request)
    {
        return response()->json([
            'tasks' => $this->_task->searchTask($request)->latest()->get(),
            'projects' => auth()->user('user')->admin->projects()->pluck('name', 'id')
        ]);
    }

    /**
     *　タスク登録
     */
    public function store(TaskRequest $request)
    {
        try {
            $params = $request->input();
            $params['admin_id'] = auth()->user('user')->admin->id;
            $params['user_id'] = auth()->user('user')->admin->id;

            $task = DB::transaction(function () use ($params) {
                return $this->_task->create($params);
            });

            return response()->json([
                'success' => true,
                'message' => 'タスクの登録が完了しました。',
                'id' => $task->id
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　タスク詳細
     */
    public function show()
    {
        return view('user.task.show', [
            'task' => $this->_task->findOrFail(request()->route('task'))
        ]);
    }

    /**
     *　タスク編集
     */
    public function edit()
    {
        return view('user.task.edit', [
            'task' => $this->_task->findOrFail(request()->route('task')),
            'projects' => auth()->user('user')->projects()->pluck('name', 'id')
        ]);
    }

    /**
     *　タスク更新
     */
    public function update(TaskRequest $request)
    {
        try {
            $params = $request->input();

            DB::transaction(function () use ($params) {
                $this->_task->findOrFail(request()->route('task'))->fill($params)->update();
            });

            return response()->json([
                'success' => true,
                'message' => 'タスクの編集が完了しました。',
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

    /**
     *　タスク削除
     */
    public function destroy()
    {
        try {
            DB::transaction(function () {
                $this->_task->findOrFail(request()->route('task'))->delete();
            });

            return response()->json([
                'success' => true,
                'message' => 'タスクの削除が完了しました。',
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }

        /**
     *　txtエクスポート
     */
    public function exportTxt(Request $request)
    {
        // タスクデータを取得
        $tasks = $this->_task->exportTask($request)->get();

        // データを整形してテキストファイルに書き込む
        $dataToExport = '';
        $tasksByProject = [];

        foreach ($tasks as $task) {
            $projectName = $task->project->name ?? '未指定';
            $check_box = "□";

            if (StatusConstants::STATUS[$task->status] === "完了") {
                $check_box = "☑︎";
            }

            if (!isset($tasksByProject[$projectName])) {
                $tasksByProject[$projectName] = [];
            }

            // タスクを案件ごとの配列に追加
            $tasksByProject[$projectName][] = "$check_box$task->title";
        }

        // データを整形してテキストファイルに書き込む
        foreach ($tasksByProject as $projectName => $projectTasks) {
            $dataToExport .= "【" . $projectName . "】\n";
            
            // タスクを完了と未完了に分けて整形
            $completedTasks = [];
            $uncompletedTasks = [];

            foreach ($projectTasks as $task) {
                if (strpos($task, '☑︎') === 0) {
                    $completedTasks[] = $task;
                } else {
                    $uncompletedTasks[] = $task;
                }
            }

            // 完了したタスクを先頭に配置
            $tasksForExport = array_merge($completedTasks, $uncompletedTasks);

            $dataToExport .= implode("\n", $tasksForExport) . "\n";
        }

        // ファイルに書き込む
        $fileName = $request->date.'_task.txt';
        file_put_contents($fileName, $dataToExport);

        // ファイルをダウンロードさせるレスポンスを返す
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}
