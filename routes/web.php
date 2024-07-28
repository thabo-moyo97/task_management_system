<?php

use App\Livewire\Tasks\AddTask;
use App\Livewire\Tasks\EditTask;
use App\Livewire\Tasks\Task;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tasks');

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')->name('profile');

    Route::get('tasks', Task::class)->name('tasks');
    Route::get('/tasks/add', AddTask::class)->name('add-task');
    Route::get('/tasks/{task}/edit/', EditTask::class)->name('edit-task');
});

require __DIR__ . '/auth.php';
