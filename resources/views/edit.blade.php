@extends('layouts.app')
@section('title', 'Create a new Todo List')
@section('content')
@section('style')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection
<form action="{{ route('task.update', ['id' => $task->id]) }}" method="post">
    @method('PUT')
    @csrf

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}" />
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">Long description:</label>
        <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Update Todo</button>
    </div>
</form>

@endsection
