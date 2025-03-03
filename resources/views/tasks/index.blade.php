@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.create') }}">Create Task</a>
    </nav>

    <div>
        @forelse ($tasks as $task)
            <a
                href="{{ route('tasks.show', ['task' => $task]) }}"
                @class(['line-through' => $task->completed])
            >
                <h3>{{ $task->title }}</h3>
            </a>
        @empty
            <div>No tasks</div>
        @endforelse
    </div>

    <div class="mt-4">
        @if ($tasks->count())
            {{ $tasks->links() }}
        @endif
    </div>
@endsection
