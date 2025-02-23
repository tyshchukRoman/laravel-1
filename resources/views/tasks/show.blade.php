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

    <p><b>{{ $task->description }}</b></p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif
@endsection
