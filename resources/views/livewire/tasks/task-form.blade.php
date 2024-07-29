@php use App\TaskStatus; @endphp
<x-slot name="header">
    <div class="flex justify-between">
        <a href="{{ route('tasks') }}"
           class="bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded cursor-pointer">
            Back
        </a>
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ isset($task) ? __('Editing Task: ' . $task->title) : __('Add New Task') }}
            </h2>
        </div>
    </div>
</x-slot>
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form wire:submit.prevent="saveTask">
                    <div class="mb-4">
                        <x-input-label for="title" class="block text-gray-700">Title</x-input-label>
                        <x-text-input required type="text" id="title" wire:model="title" class="mt-1 block w-full"
                                      value="{{ isset($task) ? $task->title : '' }}"
                        />
                        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-gray-700">Status</label>
                        <select id="status" wire:model="status"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="to_do" @if(isset($status) && $status === TaskStatus::TO_DO) selected @endif>To Do</option>
                            <option value="in_progress" @if(isset($status) && $status=== TaskStatus::IN_PROGRESS) selected @endif>In Progress</option>
                            <option value="completed" @if(isset($status) && $status=== TaskStatus::COMPLETED) selected @endif>Completed</option>
                            <option value="cancelled" @if(isset($status) && $status === TaskStatus::CANCELLED) selected @endif>Cancelled</option>
                        </select>
                        @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <x-input-label for="description" class="block text-gray-700">Description</x-input-label>
                        <textarea id="description" wire:model="description"
                                  rows="5"
                                  class="w-full text-left whitespace-normal border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            {{ isset($description) ?? $description }}
                        </textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror

                        <div class="flex justify-end mt-3">
                            <button type="submit"
                                    class="bg-black text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>