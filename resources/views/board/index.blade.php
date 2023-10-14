<x-app-layout>
    @push('scripts')
        <script src="{{ asset('js/topWindowFix.js') }}" type="module" defer></script>
        <script src="{{ asset('js/board/homePage.js') }}" type="module" defer></script>
    @endpush
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
            <x-todo.new-board />
        </div>
    </div>
</x-app-layout>
