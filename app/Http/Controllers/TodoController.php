<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Services\TodoService;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{
//==============================================    
protected TodoService $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }
//==============================================

    public function index(): View
    {
        $todos = $this->todoService->getAll();

        return view('todos.index', compact('todos'));
    }

    public function create(): View
    {
        return view('todos.create');
    }

    public function store(StoreTodoRequest $request): RedirectResponse
    {
        $this->todoService->create($request->validated());

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo created successfully!');
    }

    public function show(int $id): View
    {
        $todo = $this->todoService->getById($id);

        return view('todos.show', compact('todo'));
    }

    public function edit(int $id): View
    {
        $todo = $this->todoService->getById($id);

        return view('todos.edit', compact('todo'));
    }

    public function update(UpdateTodoRequest $request, int $id): RedirectResponse 
    {
        $this->todoService->update($id, $request->validated());

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo updated successfully!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->todoService->delete($id);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo deleted successfully!');
    }
}