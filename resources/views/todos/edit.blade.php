@extends('layouts.app')

@section('title', 'Edit Todo')

@section('content')

    <h2>Edit Todo</h2>

    <form
        action="{{ route('todos.update', $todo->id) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $todo->title) }}"
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
            >{{ old('description', $todo->description) }}</textarea>

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
                    {{ old('is_completed', $todo->is_completed) ? 'checked' : '' }}
                >
                Completed
            </label>
        </div>

        <button type="submit">
            Update Todo
        </button>

        <a href="{{ route('todos.index') }}">
            Cancel
        </a>

    </form>

@endsection