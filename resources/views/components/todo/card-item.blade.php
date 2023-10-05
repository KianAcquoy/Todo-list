@props(['task'])
<li id="taskcontainer-{{ $task->id }}" data-id="{{ $task->id }}" class="draggable task" draggable="true">
    <div id="task-{{ $task->id }}" data-id="{{ $task->id }}" class="rounded-md shadow-md cursor-pointer select-none w-[15vw] p-3" title="{{ $task->description }}" style="background-color: {{ $task->color }}">
        <div class="font-medium">
            {{ $task->name }}
        </div>
        <div class="text-sm text-gray-500 line-clamp-4">
            {{ $task->description }}
        </div>
        @if ($task->due_date)
            <div class="pt-1 text-sm text-gray-700 font-bold">
                Due {{ Carbon\Carbon::parse($task->due_date)->format('d M Y') }}
            </div>
        @endif
    </div>
</li>