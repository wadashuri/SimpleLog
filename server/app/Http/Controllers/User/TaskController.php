<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    protected $_task;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_task = auth()->user()->admin->tasks();
            return $next($request);
        });
    }


    /**
     *　タスク作成
     */
    public function create()
    {
        return view('user.task.create', [
            'tasks' => $this->_task->latest()->paginate(10),
            'projects' => auth()->user()->admin->projects()->pluck('name', 'id'),
        ]);
    }

    /**
     *　タスク登録
     */
    public function store(TaskRequest $request)
    {
        try {
            $params = $request->input();
            $params['user_id'] = auth()->user()->id;

            DB::transaction(function () use ($params) {
                $this->_task->create($params);
            });

            return redirect()->route('user.task.create')->with([
                'alert' => [
                    'message' => 'タスクの登録が完了しました。',
                    'type' => 'success'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
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

            return redirect()->route('user.task.create')->with([
                'alert' => [
                    'message' => 'タスクの編集が完了しました。',
                    'type' => 'success'
                ]
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

            return redirect()->route('user.task.create')->with([
                'alert' => [
                    'message' => 'タスクの削除が完了しました。',
                    'type' => 'danger'
                ]
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
            throw $e;
        }
    }
}
