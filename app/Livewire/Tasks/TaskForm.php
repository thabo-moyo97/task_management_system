<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use App\TaskStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class TaskForm extends Component
{
    public ?Task $task = null;
    public string $title = '';
    public TaskStatus $status;
    public string $description = '';

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'status' => ['required', new Enum(TaskStatus::class)],
            'description' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'task.title.required' => 'The title field is required.',
            'task.title.string' => 'The title field must be a string.',
            'task.title.max' => 'The title field must not exceed 255 characters.',
            'task.status.required' => 'The status field is required.',
            'task.status.enum' => 'The status field must be one of: ' . implode(', ', array_column(TaskStatus::cases(), 'value')),
            'task.description.required' => 'The description field is required.',
            'task.description.string' => 'The description field must be a string.',
        ];
    }

    public function mount(?Task $task = null)
    {
        if (isset($task)) {
            $this->task = $task;
            $this->title = $task->title;
            $this->status = $task->status;
            $this->description = $task->description;
        }
    }

    public function saveTask()
    {
        $validated = $this->validate();

        if (!Auth::check()) {
            return $this->redirect(route('login'));
        }

        if ($this->task) {
            $this->task->update($validated);
        } else {
            Task::create([
                ...$validated,
                'user_id' => Auth::id(),
            ]);
        }

        return $this->redirect(\App\Livewire\Tasks\Task::class);
    }

    public function render()
    {
        return view('livewire.tasks.task-form')->layout('layouts.app');
    }
}