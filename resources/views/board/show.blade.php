<x-app-layout>
    @push('scripts')
        @vite('resources/js/board/dragAndDrop.js')
        @vite('resources/js/board/taskInfo.js')
        @vite('resources/js/board/modal.js')
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

    <div id="app-information" class="hidden" data-board-id="{{ $board->id }}" data-user-id="{{ Auth::user()->id }}"></div>

    <x-todo.modal />

</x-app-layout>