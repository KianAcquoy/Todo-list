@props(['task'])

<li id="taskcontainer-{{ $task->id }}" data-id="{{ $task->id }}" class="draggable task card-container" draggable="true">
    <div id="task-{{ $task->id }}" data-id="{{ $task->id }}" class="bg-white rounded-md shadow-md cursor-pointer select-none w-[15vw] p-3" title="{{ $task->description }}">
        <div class="font-medium">
            {{ $task->name }}
        </div>
        <div class="text-sm text-gray-500">
            {{ $task->description }}
        </div>
    </div>
</li>