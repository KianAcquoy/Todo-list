<x-app-layout>
    @push('scripts')
        @vite('resources/js/board/dragAndDrop.js')
        @vite('resources/js/board/boardPage.js')
        @vite('resources/js/topWindowFix.js')
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $board->title }}
        </h2>
    </x-slot>
    <div class="flex justify-start">
        <div class="fixed left-3 bottom-3">
            <div class="bg-white flex p-2 rounded-md shadow-xl">
                <div id="board-settings" class="w-[3vw] cursor-pointer">
                    <x-icons.gear />
                </div>
            </div>
        </div>
    </div>
    <div class="py-12 w-full">
        <div class="flex justify-center">
            @foreach ($board->cards as $card)
                <x-todo.card :card="$card" />
            @endforeach
        </div>
    </div>

    <div id="app-information" class="hidden" data-board-id="{{ $board->id }}" data-user-id="{{ Auth::user()->id }}"></div>

</x-app-layout>