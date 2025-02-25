@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create Task')

@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="field">
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}" />
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
            <textarea type="text" name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
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
            <textarea type="text" name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
        </div>
        @error('long_description')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <button type="submit">
            @isset($task)
                Edit Task
            @else
                Add Task
            @endisset
        </button>
    </form>
@endsection
