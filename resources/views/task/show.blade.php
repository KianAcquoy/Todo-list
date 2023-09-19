<!-- task details -->
<x-app-layout>
    @push('scripts')
        @vite('resources/js/board.js')
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $task->name }}
        </h2>
    </x-slot>
    

</x-app-layout>