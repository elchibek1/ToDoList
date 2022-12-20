@extends('main.base')
@section('content')
    @if(session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container mt-5 bg-warning">

        <h3 class="text-center mb-5 text-success">All Tasks</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="row text-end">
            <form action="{{action([\App\Http\Controllers\TasksController::class, 'deleteAllTask'])}}" method="get">
                @csrf
                <button type="submit" class="btn btn-success">
                    Delete tasks
                </button>
            </form>
        </div>
        <div class="row">
            <table class="table table-striped text-success">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Task</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->task}}</td>
                        <td>{{$task->status}}</td>
                        <td>
                            @if($task->status == \App\Models\Task::NEW)
                                <form style="display: inline-block" action="{{action([\App\Http\Controllers\TasksController::class, "statusInProgress"], ["task" => $task])}}" method="post">
                                   @csrf
                                    <button type="submit" class="btn btn-success">start executing</button>
                                </form>
                            @endif
                            @if($task->status == \App\Models\Task::INPROGRESS)
                                    <form style="display: inline-block" action="{{action([\App\Http\Controllers\TasksController::class, "statusDone"], ["task" => $task])}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success">finish executing</button>
                                    </form>
                                @endif
                                <form style="display: inline-block" action="{{action([\App\Http\Controllers\TasksController::class, "deleteTask"], ["task" => $task])}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-success">delete</button>
                                </form>
                                <form  style="display: inline-block" action="{{action([\App\Http\Controllers\TasksController::class, 'edit'], ["task" => $task])}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-success">edit</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="container">
                <h2 class="text-success text-center mt-3">Add a new task</h2>
                <div class="row">
                    <form action="{{action([\App\Http\Controllers\TasksController::class, 'addTask'])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" id="task" name="task" placeholder="To do.."/>
                        </div>
                        <div class="mt-3 text-center pb-3">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

