<?php

use App\Livewire\Tasks\Task;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('tasks', Task::class)
    ->middleware(['auth', 'verified'])
    ->name('tasks');


require __DIR__.'/auth.php';
