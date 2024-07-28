<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;

class ViewTask extends Component
{
    public Task $task;

    public function mount(Task $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.tasks.view-task')->layout('layouts.app');
    }
}