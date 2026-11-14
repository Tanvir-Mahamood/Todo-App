@extends('layouts.app')

@section('title', 'All Todos')

@section('content')

    <h2>All Todos</h2>

    <a href="{{ route('todos.create') }}">
        + Create New Todo
    </a>

    <hr>

    @forelse($todos as $todo)

        <div class="todo-item">

            <h3>
                {{ $todo->title }}
            </h3>

            <p>
                Status:
                {{ $todo->is_completed ? 'Completed' : 'Pending' }}
            </p>

            <p>
                {{ $todo->description }}
            </p>

            <a href="{{ route('todos.show', $todo->id) }}">
                View
            </a>

            |

            <a href="{{ route('todos.edit', $todo->id) }}">
                Edit
            </a>

            |

            <form
                action="{{ route('todos.destroy', $todo->id) }}"
                method="POST"
                class="inline"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    onclick="return confirm('Are you sure you want to delete this todo?')"
                >
                    Delete
                </button>

            </form>

        </div>

    @empty

        <p>No todos available. Create your first todo!</p>

    @endforelse

@endsection