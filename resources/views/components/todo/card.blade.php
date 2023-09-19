@props(['card'])

<div id="card-{{ $card->id }}" class="card bg-white rounded-md shadow-md select-none w-[18vw] p-3 mx-[1vw] my-[1vh]">
    <div class="font-medium">
        {{ $card->name }}
    </div>
    <x-todo.card-item-container :tasks="$card->tasks" :card="$card" />
</div>
