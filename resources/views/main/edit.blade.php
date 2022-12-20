@extends('main.base')
@section('content')
    @if(session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @endsection
