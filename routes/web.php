<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('home');

Route::prefix('todos')->name('todos.')->controller(TodoController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->whereNumber('id')->name('edit');
    Route::get('/{id}', 'show')->whereNumber('id')->name('show');
    Route::put('/{id}', 'update')->whereNumber('id')->name('update');
    Route::delete('/{id}', 'destroy')->whereNumber('id')->name('destroy');
});