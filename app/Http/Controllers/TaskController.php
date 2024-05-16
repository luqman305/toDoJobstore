<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->session()->get('tasks', []);

        return view('home', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $tasks = $request->session()->get('tasks', []);
        $newTask = [
            'id' => count($tasks) + 1,
            'description' => $request->input('description'),
            'is_active' => true,
        ];
        array_unshift($tasks, $newTask); // Add the new task to the beginning
        $request->session()->put('tasks', $tasks);

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, $id)
    {
        $tasks = $request->session()->get('tasks', []);
        foreach ($tasks as &$task) {
            if ($task['id'] == $id) {
                $task['is_active'] = ! $task['is_active'];
                break;
            }
        }
        $request->session()->put('tasks', $tasks);

        return redirect()->route('tasks.index');
    }

    public function destroy(Request $request, $id)
    {
        $tasks = $request->session()->get('tasks', []);
        $tasks = array_filter($tasks, function ($task) use ($id) {
            return $task['id'] != $id;
        });
        $request->session()->put('tasks', array_values($tasks));

        return redirect()->route('tasks.index');
    }
}
