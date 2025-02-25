@extends('layouts.app')

@section('title', 'Add Task')

@section('content')

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="field">
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" />
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
            <textarea type="text" name="description" id="description">{{ old('description') }}</textarea>
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
            <textarea type="text" name="long_description" id="long_description">{{ old('long_description') }}</textarea>
        </div>
        @error('long_description')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <button type="submit">Create Task</button>
    </form>
@endsection
