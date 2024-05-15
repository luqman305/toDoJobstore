<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::paginate(5);

        return view('home', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        Task::create($request->only('description'));

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'is_active' => ! $task->is_active,
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
