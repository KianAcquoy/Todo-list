@props(['board'])


<a class="bg-white rounded-md shadow-md select-none cursor-pointer w-[18vw] p-3 mx-[1vw] my-[1vh] hover:scale-[110%] transition-transform" href="{{ route('boards.show', $board) }}">
    <div class="font-medium">
        {{ $board->title }}
    </div>
    <div class="text-sm max-w-[80%] line-clamp-2 text-gray-500">
        {{ $board->description }}
    </div>
</a>