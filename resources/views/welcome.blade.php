@extends('layouts.app')
@section('title')
    <h1>List of task</h1>
@endsection
@section('content')
    <div>

        @if (count($tasks))
            @foreach ($tasks as $task)
                <li><a href="{{ route('task.detail', ['id' => $task->id]) }}">{{ $task->title }}</a></li>
            @endforeach
        @else
            <p>i got nothing</p>
        @endif
    </div>
@endsection
