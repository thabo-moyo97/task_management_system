<?php

namespace App\Livewire\Tasks;

use App\Models\Task;

class EditTask extends TaskForm
{
    public function mount(Task $task = null): void
    {
        parent::mount($task);
    }
}
