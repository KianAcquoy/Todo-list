<x-app-layout>
    @push('scripts')
        @vite('resources/js/board.js')
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $board->title }}
        </h2>
    </x-slot>

    <div class="py-12 w-[100vw]">
        <div class="flex justify-center">
            @foreach ($board->cards as $card)
                <x-todo.card :card="$card" />
            @endforeach
        </div>
    </div>
    <div class="draggable"></div>
</x-app-layout>