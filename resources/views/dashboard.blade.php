<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-wrap max-w-[80vw] mx-auto">
            @foreach (Auth::user()->boards as $board)
                <x-todo.board-item :board="$board" />
            @endforeach
        </div>
    </div>
</x-app-layout>
