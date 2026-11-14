<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Todo App')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
            line-height: 1.6;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 12px;
            box-sizing: border-box;
        }

        button, .button {
            padding: 7px 12px;
            cursor: pointer;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        .todo-item {
            border-bottom: 1px solid #ddd;
            padding: 12px 0;
        }

        .inline {
            display: inline;
        }
    </style>
</head>

<body>

    <header>
        <h1>
            <a href="{{ route('todos.index') }}">My Todo App</a>
        </h1>
        <hr>
    </header>

    @if(session('success'))
        <p class="success">
            {{ session('success') }}
        </p>
    @endif

    <main>
        @yield('content')
    </main>

</body>
</html>