@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

    <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" />
        </div>
        @error('title')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <div class="field">
            <label for="description">
                Description
            </label>
            <textarea type="text" name="description" id="description">{{ $task->description }}</textarea>
        </div>
        @error('description')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <div class="field">
            <label for="long_description">
                Long Description
            </label>
            <textarea type="text" name="long_description" id="long_description">{{ $task->description }}</textarea>
        </div>
        @error('long_description')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <button type="submit">Update Task</button>
    </form>
@endsection
