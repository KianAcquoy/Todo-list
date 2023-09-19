<x-popupweb-layout>
    @push('scripts')
        @vite('resources/js/board.js')
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $task->name }}
        </h2>
    </x-slot>

    <div class="py-8">
    <div class="max-w-3xl mx-auto px-4">
        <!-- Description -->
        <div class="bg-white rounded-lg p-6 mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Task Description</h2>
            <p class="text-gray-600 text-base mt-2">{{ $task->description }}</p>
        </div>

        <!-- Current Card -->
        <div class="bg-white rounded-lg p-6 mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Current Card</h2>
            @if ($task->card)
                <p class="text-gray-600 text-base mt-2">{{ $task->card->name }}</p>
            @else
                <p class="text-gray-600 text-base mt-2">None</p>
            @endif
        </div>

        <!-- Date Information -->
        <div class="bg-white rounded-lg p-6 mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Date Information</h2>
            <p class="text-gray-600 text-base mt-2">Due Date: {{ $task->due_date }}</p>
            <p class="text-gray-600 text-base">Created At: {{ $task->created_at }}</p>
            <p class="text-gray-600 text-base">Updated At: {{ $task->updated_at }}</p>
        </div>
    </div>
</div>

    
</x-popupweb-layout>