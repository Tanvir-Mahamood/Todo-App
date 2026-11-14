@extends('layouts.app')

@section('title', 'Todo Details')

@section('content')

    <h2>Todo Details</h2>

    <h3>{{ $todo->title }}</h3>

    <p>
        <strong>Description:</strong>
        {{ $todo->description ?: 'No description provided.' }}
    </p>

    <p>
        <strong>Status:</strong>

        {{ $todo->is_completed ? 'Completed' : 'Pending' }}
    </p>

    <p>
        <strong>Created At:</strong>
        {{ $todo->created_at->format('d M Y, h:i A') }}
    </p>

    <a href="{{ route('todos.edit', $todo->id) }}">
        Edit Todo
    </a>

    |

    <a href="{{ route('todos.index') }}">
        Back to Todos
    </a>

@endsection