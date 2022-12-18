@extends('main.base')
@section('content')
    <div class="container mt-5 bg-warning">
        @if(session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
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
                                <form action="{{action([\App\Http\Controllers\TasksController::class, "statusInProgress"], ["task" => $task])}}" method="post">
                                   @csrf
                                    <button type="submit" class="btn btn-primary">start executing</button>
                                </form>
                            @endif
                            @if($task->status == \App\Models\Task::INPROGRESS)
                                    <form action="{{action([\App\Http\Controllers\TasksController::class, "statusDone"], ["task" => $task])}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">finish executing</button>
                                    </form>
                                @endif
                                <form action="{{action([\App\Http\Controllers\TasksController::class, "deleteTask"], ["task" => $task])}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-primary">delete</button>
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
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

