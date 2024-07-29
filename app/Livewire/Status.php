<?php

namespace App\Livewire;

use App\Models\Task;
use App\TaskStatus;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Status extends Component
{
    public TaskStatus $status;
    public string $color = '';
    public string $label = '';

    public function mount(TaskStatus $status)
    {
        $this->status = $status;
        $this->loadStatus();
    }

    public function loadStatus()
    {
        $this->color = $this->getColor($this->status);
        $this->label = $this->getLabel($this->status);
    }
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
            TaskStatus::IN_PROGRESS => 'status-in-progress',
            TaskStatus::COMPLETED => 'status-completed',
            TaskStatus::CANCELLED => 'status-cancelled',
            TaskStatus::TO_DO => 'status-to-do'
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
