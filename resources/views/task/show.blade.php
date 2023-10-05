<x-popupweb-layout>
    <div class="p-2 space-y-8">
        <div id="title" class="flex">
            <div class="px-4 flex justify-center items-center">
                <x-icons.board />
            </div>
            <div>
                <div class="font-semibold">
                    {{ $task->name }}
                </div>
                <div class="text-md font-light">
                    in <a class="underline underline-offset-2">{{ $task->card->name }}</a>
                </div>
            </div>
        </div>
        <div id="labels" class="flex">
            <div class="px-4 flex justify-center items-center">
                <x-icons.labels />
            </div>
            <div class="flex flex-wrap space-y-1 space-x-4">
                <x-todo.label name="{{ Carbon\Carbon::parse($task->due_date)->format('d-m-Y') }}" color="tomato" icon="calendar" />
                @foreach ($task->labels as $label)
                    <x-todo.label name="{{ $label->name }}" color="{{ $label->color }}" icon="{{ $label->icon }}" />
                @endforeach
            </div>
        </div>
        <div id="description" class="flex">
            <div class="px-4 flex justify-center items-center">
                <x-icons.paragraph />
            </div>
            <div class="space-y-2">
                <div class="font-semibold relative">
                    Description
                </div>
                <div class="text-md font-light">
                    {{ $task->description }}
                </div>
            </div>
        </div>
        <div id="comments" class="flex">
            <div class="px-4 flex justify-center items-center">
                <x-icons.bulletlist />
            </div>
            <div class="space-y-2">
                <div class="font-semibold relative">
                    Comments
                    <div class="absolute top-0 right-1">
                    </div>
                </div>
                <div class="text-md font-light">
                    Comment section
                </div>
            </div>
        </div>

        <div class="fixed right-4 bottom-4 shadow-md">
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 py-1 rounded flex items-center">
                    <div class="pr-1 fill-white">
                        <x-icons.pensil />
                    </div>
                    Edit
                </button>
            </a>
        </div>
    </div>
</x-popupweb-layout>