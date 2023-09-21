@props(['card'])

<div id="card-{{ $card->id }}" data-id="{{ $card->id }}" class="card bg-white rounded-md shadow-md select-none w-[18vw] p-3 mx-[1vw] my-[1vh]">
    <div class="font-medium flex items-center justify-between mx-4">
        <p>{{ $card->name }}</p>
        <div data-id="{{ $card->id }}" class="newtask flex text-sm items-center bg-gray-100 hover:bg-gray-200 rounded-full px-1 text-gray-700 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <p>New</p>
        </div>
    </div>
    <x-todo.card-item-container :tasks="$card->tasks" :card="$card" />
</div>
