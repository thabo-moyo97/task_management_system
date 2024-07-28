<?php

namespace App\Livewire\Tasks;

use App\Models\Task;

class AddTask extends TaskForm
{
    public function mount(?Task $task = null)
    {
        parent::mount($task);
    }

}