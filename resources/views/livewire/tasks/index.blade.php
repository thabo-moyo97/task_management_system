<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>

        <a class="bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded cursor-pointer">
            Add Task
        </a>
    </div>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Assigned to
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($tasks->isEmpty())
                        <tr>
                            <td class="px-6 text-center py-10 whitespace-no-wrap text-md leading-5 text-gray-500"
                                colspan="4">
                                No tasks found.
                            </td>
                        </tr>
                    @else
                        @foreach($tasks as $task)
                            <tr class="bg-white" wire:key="{{ $task->id }}">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                    {{ $task->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm text-left leading-5 text-gray-500">
                                    @livewire('status', ['status' => $task->status])
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{ $task->user->name }}
                                </td>
                                <td class="text-center flex flex-col md:flex-row items-center justify-center mt-2">
                                    <a class="bg-gray-800 w-full md:w-auto flex-1 md:flex-grow-0 mx-2 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded cursor-pointer">
                                        Edit
                                    </a>
                                    <a class="bg-red-600 w-full md:w-auto flex-1 md:flex-grow-0 mt-1 md:mt-0 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded cursor-pointer">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
