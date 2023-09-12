@props(['tasks'])

<div class="flex flex-col space-y-5 my-2 items-center">
    @foreach ($tasks as $task)
        <div id="taskcontainer{{ $task->id }}" class="card-container" draggable="true">
            <div id="draggable" class="card bg-white rounded-md shadow-md cursor-pointer select-none w-[15vw] p-3" title="{{ $task->description }}">
                <div class="font-medium">
                    {{ $task->name }}
                </div>
                <div class="text-sm text-gray-500">
                    {{ $task->description }}
                </div>
            </div>
        </div>
    @endforeach
</div>