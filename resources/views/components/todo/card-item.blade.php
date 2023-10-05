@props(['task'])
<li id="taskcontainer-{{ $task->id }}" data-id="{{ $task->id }}" class="draggable task" draggable="true">
    <div id="task-{{ $task->id }}" data-id="{{ $task->id }}" class="rounded-md shadow-md cursor-pointer select-none w-[15vw] p-3" title="{{ $task->description }}" style="background-color: {{ $task->color }}">
        <div class="font-medium">
            {{ $task->name }}
        </div>
        <div class="text-sm text-gray-500 line-clamp-4">
            {{ $task->description }}
        </div>
    </div>
</li>