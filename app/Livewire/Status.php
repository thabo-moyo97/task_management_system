<?php

namespace App\Livewire;

use App\TaskStatus;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Status extends Component
{
    public TaskStatus $status;

    public function render(): View|Factory|Application
    {
        return view('livewire.status', [
            'color' => $this->getColor($this->status),
            'label' => $this->getLabel($this->status),
        ]);
    }
    private function getColor(TaskStatus $status): string
    {
        return match ($status) {
            TaskStatus::IN_PROGRESS => 'bg-blue-600',
            TaskStatus::COMPLETED => 'bg-green-600',
            TaskStatus::CANCELLED => 'bg-red-600',
            TaskStatus::TO_DO => 'bg-yellow-600',
        };
    }

    private function getLabel(TaskStatus $status): string
    {
        return match ($status) {
            TaskStatus::TO_DO => 'To Do',
            TaskStatus::IN_PROGRESS => 'In Progress',
            TaskStatus::COMPLETED => 'Completed',
            TaskStatus::CANCELLED => 'Cancelled',
        };
    }
}
