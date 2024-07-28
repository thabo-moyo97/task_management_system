<?php

namespace App\Livewire\Tasks;

use App\Models\Task as TaskModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Component;

class Task extends Component
{
    public Collection $tasks;

    public function render(): View|Factory|Application
    {
        $this->tasks = TaskModel::latest()->paginate(10)->getCollection();

        return view('livewire.tasks.index')->layout('layouts.app');
    }
}
