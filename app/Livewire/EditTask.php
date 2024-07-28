<?php

namespace App\Livewire;

use App\Models\Task;
use App\TaskStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class EditTask extends Component
{
    public ?Task $task;

    public string $title;
    public TaskStatus $status;
    public string $description;

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
            'task.status.enum' => 'The status field must',
            'task.description.required' => 'The description field is required.',
            'task.description.string' => 'The description field must be a string.',
        ];
    }

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->status = $task->status;
        $this->description = $task->description;
    }

    public function saveTask(): Redirector
    {
        $validated = $this->validate();

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->task->update($validated);

        return redirect()->route('tasks');
    }

    public function render()
    {
        return view('livewire.edit-task')->layout('layouts.app');
    }
}
