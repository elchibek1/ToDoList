@extends('main.base')
@section('content')
    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <h3>All Tasks</h3>
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
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

