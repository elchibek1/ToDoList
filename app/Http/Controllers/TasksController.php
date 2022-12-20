<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('main.index', compact('tasks'));
    }

    public function addTask(Request $request)
    {
        $task = new Task($request->all());
        $task->save();
        return redirect()->action([self::class, 'index'])->with('message', "task {$task->task} added successfully");
    }

    public function edit(Task $task)
    {
        return view('main.edit', compact('task'));
    }

    public function update(Request $request,Task $task)
    {
        $validated = $request->validate(
            ['task' => 'required|max:128']
        );
        $task->update($validated);
        return redirect()->action([self::class, "show"], compact('task'))->with('message', "task {$task->task} updated successfully");

    }

    public function show(Task $task)
    {
        return view('main.show', compact('task'));
    }

    public function statusInProgress(Task $task)
    {
        $task->status = Task::INPROGRESS;
        $task->save();
        return redirect()->action([self::class, 'index'])->with('message', "task {$task->task} gets to work");
    }

    public function statusDone(Task $task)
    {
        $task->status = Task::DONE;
        $task->save();
        return redirect()->action([self::class, 'index'])->with('message', "task {$task->task} completed");
    }


    public function deleteTask(Task $task)
    {
        $task->delete();
        return redirect()->action([self::class, 'index'])->with('message', "task {$task->task} deleted");
    }

    public function deleteAllTask()
    {
        $tasks = Task::all();
        foreach ($tasks as $task)
        {
            if($task->status == Task::DONE)
            {
                $task->delete();
            }
        }
        return redirect()->action([self::class, 'index'])->with('message', "all tasks with a status od done have been deleted");
    }

}
