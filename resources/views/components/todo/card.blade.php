@props(['card'])

<div id="dropzone" class="card bg-white rounded-md shadow-md select-none w-[18vw] p-3 mx-[1vw] my-[1vh]">
    <div class="font-medium">
        {{ $card->name }}
    </div>
    <x-todo.card-items :tasks="$card->tasks" />
</div>
