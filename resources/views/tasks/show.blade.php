@extends('layouts.app')

@section('title', $task->title)

@section('content')
    </h2>Task #{{ $task->id }}</h2>

    <ul style="display:flex;gap:1.5rem;align-items:center;">
        <li>
            <a href="{{ route('tasks.index') }}">Home</a>
        </li>
        <li>
            <p>{{ $task->title }}</p>
        </li>
    </ul>

    <div>
        <p>
            {{ $task->description }}
        </p>
    </div>

    @if ($task->long_description)
        <div>
            <p>
                {{ $task->long_description }}
            </p>
        </div>
    @endif
@endsection
