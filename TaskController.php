<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create()
    {
        $tasks = Task::paginate(3);
        return view('task', compact('tasks'));
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->taskName;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->assigned = $request->taskAssigned;
        
        $task->save();
        
        return redirect('/dashboard')->with('success', "Task Created");
    }

    public function getTaskCount()
    {
        $count = Task::count();
        return response()->json(['count' => $count]);
    }

    public function getTaskDetails()
    {
        $tasks = Task::all(); 
        return response()->json(['tasks' => $tasks]);
    }

    public function getdata()
    {
        $tasks = Task::paginate(5);
        return view('task', compact('tasks'));
    }

    public function getUnreadTasks()
    {
        $tasks = Task::where('read', false)->get();

        return response()->json([
            'unreadCount' => $tasks->count(),
            'tasks' => $tasks->toArray()
        ]);
    }
}
