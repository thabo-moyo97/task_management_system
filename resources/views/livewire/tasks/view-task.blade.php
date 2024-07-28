<x-slot name="header">
    <div class="flex justify-between">
        <a href="{{ route('tasks') }}"
           class="bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded cursor-pointer">
            Back
        </a>
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{  __('Viewing Task: ' . $task->title)  }}
            </h2>
        </div>
    </div>
</x-slot>
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $task->title }}
                </h2>
                <div class="mt-3">
                    <strong>Status:</strong> @livewire('status', ['status' => $task->status])
                </div>
                <p class="mt-4">
                    <strong>Description:</strong> {{ $task->description }}
                </p>

            </div>
        </div>
    </div>
</div>