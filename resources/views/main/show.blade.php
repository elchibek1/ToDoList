@extends('main.base')
@section('content')
    @if(session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container text-center mt-5">
        <h2>Task:</h2>
        <h2 class="text-warning"> {{$task->task}}</h2>
        <div class="mt-3" style="display: inline-block">
            <button type="submit" class="btn bg-success"><a
                    href="{{action([\App\Http\Controllers\TasksController::class, 'index'])}}" class="text-warning">Home</a></button>
        </div>
        <div class="mt-3" style="display: inline-block">
            <button type="submit" class="btn bg-success"><a
                    href="{{action([\App\Http\Controllers\TasksController::class, 'edit'], ['task' => $task])}}"
                    class="text-warning">Change Task</a></button>
        </div>
        <div class="mt-3" style="display: inline-block">
            <form action="{{action([\App\Http\Controllers\TasksController::class, 'deleteTask'], ['task' => $task])}}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn bg-success">Delete</button>
            </form>
        </div>
    </div>

@endsection
