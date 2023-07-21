@extends('layouts/app')
@section('title')
    <h1>{{ $task->title }}</h1>
@endsection
@section('content')
    <p>{{ $task->description }}</p>
    @if (isset($task->long_description))
        <p>{{ $task->long_description }}</p>
    @endif
    <p>Created at: {{ $task->created_at }}</p>
    <p>Updated at: {{ $task->updated_at }}</p>
    <p>Status: {{ $task->completed ? 'Completed' : 'Not completed' }}</p>
@endsection
