@extends('layouts.app')

@section('title', 'Create Todo')

@section('content')

    <h2>Create a New Todo</h2>

    <form action="{{ route('todos.store') }}" method="POST">

        @csrf

        <div>
            <label for="title">Title:</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
            >

            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description:</label>

            <textarea
                id="description"
                name="description"
                rows="4"
            >{{ old('description') }}</textarea>

            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="hidden" name="is_completed" value="0">

            <label>
                <input
                    type="checkbox"
                    name="is_completed"
                    value="1"
                    {{ old('is_completed') ? 'checked' : '' }}
                >
                Mark as completed
            </label>
        </div>

        <button type="submit">
            Save Todo
        </button>

        <a href="{{ route('todos.index') }}">
            Cancel
        </a>

    </form>

@endsection