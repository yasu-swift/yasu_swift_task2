<?php

namespace App\Http\Controllers;

// Taskクラスを読み込む
use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    // showページへ移動
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function index()
    {
        // モデル名::テーブル全件取得
        $tasks = Task::all();
        // tasksティレクトリーの中のindexページを指定し、tasksの連想配列を代入
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        //インスタンス化
        $task = new Task;
        //値を用意
        $task->title = $request->title;
        $task->body = $request->body;
        //保存
        $task->save();
        // 登録したらindexに戻る
        return redirect('/tasks');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', ['task' => $task]);
    }


    public function update(TaskRequest $request, $id)
    {
        //元のデータを取得
        $task = Task::find($id);
        //値を用意
        $task->title = $request->title;
        $task->body = $request->body;

        //保存
        $task->save();
        // 登録したらindexに戻る
        return redirect('/tasks');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/tasks');
    }
}
