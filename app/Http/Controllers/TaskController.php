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

    public function show($id)
    {
        if (!$task = $this->task->find($id)) {
            return response()->json([
                'data' => [],
                'message' => 'Task not found',
                'code' => 404
            ]);
        }

        return view('tasks.create', compact('task'));
    }

    public function update(TaskUpdateRequest $request, $id)
    {
        $task = $this->task->find($id);

        $task->update($request->all());

        return response()->json([
            'data' => $task,
            'message' => 'Task not found',
            'code' => 404
        ]);
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

        return response()->json([
            'data' => [],
            'message' => 'Task successfully deleted',
            'code' => 200
        ]);
    }
}
