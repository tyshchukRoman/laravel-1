@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div>
        @forelse ($tasks as $task)
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                <h3>{{ $task->title }}</h3>
            </a>
        @empty
            <div>No tasks</div>
        @endforelse
    </div>

    @if ($tasks->count())
        {{ $tasks->links() }}
    @endif
@endsection
