<?php

namespace App\Services;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoService
{
    public function getAll(): Collection
    {
        return Todo::latest()->get();
    }

    public function create(array $data): Todo
    {
        return Todo::create($data);
    }

    public function getById(int $id): Todo
    {
        return Todo::findOrFail($id);
    }

    public function update(int $id, array $data): Todo
    {
        $todo = $this->getById($id);

        $todo->update($data);

        return $todo->refresh();
    }

    public function delete(int $id): void
    {
        $todo = $this->getById($id);

        $todo->delete();
    }
}