<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        if ($userId) {
            $tasks = Task::query()->where('user_id', '=', $userId)->orderBy('created_at', 'DESC')->paginate(3);
        }

        return Inertia::render('Tasks/Index', [
            'title' => 'Tasks',
            'tasks' => $tasks
        ]);
    }

    public function show($id)
    {
        $task = Task::query()->where('user_id', '=', auth()->id())->findOrFail($id);
        return Inertia::render('Tasks/Show', [
            'title' => 'Tasks',
            'task' => $task
        ]);
    }

    public function create()
    {
        return Inertia::render('Tasks/Create', [
            'title' => 'Task create',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:5', 'string'],
            'title' => ['required', 'min:5', 'string'],
            'phone' => ['required', 'max:11', 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
            'company' => ['required', 'string'],
            'text' => ['required', 'min:5', 'string'],
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            if ($file) {
                $data['files'] = $request->file->store('files');
            }
        }

        $task = auth()->user()->tasks()->create($data);

        if ($task) {
            return redirect()->route('tasks.show', $task->id);
        }
    }

    public function download($id)
    {
        $task = Task::query()->where('user_id', '=', auth()->id())->findOrFail($id);
        return response()->download('storage/' . $task->files);
    }

    public function destroy(Task $task)
    {
        if ($task->files) {
            Storage::delete($task->files);
        }
        $task->delete();
        return redirect()->back();
    }
}
