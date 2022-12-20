@extends('main.base')
@section('content')
    @if(session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container mt-5">
        <h2 class="text-success text-center mt-3">Edit task</h2>
        <div class="row">
            <form action="{{action([\App\Http\Controllers\TasksController::class, 'update'], ['task' => $task])}}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" id="task" name="task" placeholder="To change.. "/>
                </div>
                <div class="mt-3 text-center pb-3">
                    <button type="submit" class="btn btn-success">Change</button>
                </div>
            </form>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn bg-success"><a
                    href="{{action([\App\Http\Controllers\TasksController::class, 'show'], ['task' => $task])}}" class="text-warning">Back</a></button>
        </div>
    </div>

    @endsection
