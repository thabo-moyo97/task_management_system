<?php

use App\Livewire\EditTask;
use App\Livewire\Tasks\Task;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tasks');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('tasks', Task::class)
    ->middleware(['auth', 'verified'])
    ->name('tasks');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks/{task}/edit', EditTask::class)->name('edit-task');
});

require __DIR__ . '/auth.php';
