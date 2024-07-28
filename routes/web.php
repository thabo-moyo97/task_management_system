<?php

use App\Livewire\Tasks\Task;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tasks');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('tasks', Task::class)
    ->middleware(['auth', 'verified'])
    ->name('tasks');


require __DIR__.'/auth.php';
