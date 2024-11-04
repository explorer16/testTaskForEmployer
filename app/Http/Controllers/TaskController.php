<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        Task $task
    ) {
        $this->task = $task;
    }

    public function index()
    {
        $tasks = $this->task;

        $tasks = $tasks->filter()->sort();

        $tasks = $tasks->paginate(10);
        logger($tasks->toArray());

        return view('tasks.index', compact('tasks'));
    }


    public function create() {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $task = $this->task;

        $task = $task->create($request->all());

        return redirect(route('tasks.index'));
    }

    public function edit($id)
    {
        if (!$task = $this->task->find($id)) {
            return response()->json([
                'data' => [],
                'message' => 'Task not found',
                'code' => 404
            ]);
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(TaskUpdateRequest $request, $id)
    {
        $task = $this->task->find($id);

        $task->update($request->all());

        return redirect(route('tasks.index'));
    }

    public function setStatus(Request $request, $id)
    {
        if (!$task = $this->task->find($id)) {
            return response()->json([
                'data' => [],
                'message' => 'Task not found',
                'code' => 404
            ]);
        }

        $task->completed = $request->input('status') == '1';
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Статус задачи обновлён.');
    }

    public function destroy($id)
    {
        if (!$task = $this->task->find($id)) {
            return response()->json([
                'data' => [],
                'message' => 'Task not found',
                'code' => 404
            ]);
        }

        $task->delete();

        return redirect(route('tasks.index'));
    }
}
