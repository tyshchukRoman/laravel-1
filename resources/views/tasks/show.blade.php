@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.index') }}"><- Go Back</a>
    </nav>

    </h2 class="mb-8">Task #{{ $task->id }}</h2>

    <ul style="flex gap-4 items-center">
        <li>
            <a href="{{ route('tasks.index') }}">Home</a>
        </li>
        <li>
            <p>{{ $task->title }}</p>
        </li>
    </ul>

    <p class="mb-4 text-slate-700"><b>{{ $task->description }}</b></p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="text-sm text-slate-500">
        Created: {{ $task->created_at->diffForHumans() }}
    </p>
    <p class="mb-4 text-sm text-slate-500">
        Updated: {{ $task->updated_at->diffForHumans() }}</p>
    </p>

    <div class="flex gap-2">
        <a class="btn" href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>

        <form
            action="{{ route('tasks.toggle-complete', ['task' => $task]) }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <button class="btn" type="submit">Mark as {{ $task->completed ? 'not completed' : 'completed' }}</button>
        </form>

        <form
            action="{{ route('tasks.destroy', ['task' => $task]) }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button class="btn" type="submit">Delete</button>
        </form>
    </div>
@endsection
