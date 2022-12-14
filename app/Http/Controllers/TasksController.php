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

    public function addTask()
    {

    }

    public function statusInProgress()
    {

    }

    public function statusDone()
    {

    }

    public function deleteTask()
    {

    }

    public function deleteAllTask()
    {

    }

}
