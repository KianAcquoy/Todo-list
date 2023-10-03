@props(['task'])
<div class="bg-blue-100 bg-orange-100 bg-yellow-100 bg-green-100 bg-yellow-100" hidden></div>
<li id="taskcontainer-{{ $task->id }}" data-id="{{ $task->id }}" class="draggable task" draggable="true">
    <div id="task-{{ $task->id }}" data-id="{{ $task->id }}" class="{{ $task->priorityColor() }} rounded-md shadow-md cursor-pointer select-none w-[15vw] p-3" title="{{ $task->description }}">
        <div class="font-medium">
            {{ $task->name }}
        </div>
        <div class="text-sm text-gray-500 line-clamp-4">
            {{ $task->description }}
        </div>
    </div>
</li>