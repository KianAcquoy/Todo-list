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
                    <div class="absolute top-0 right-1">
                        <button class="bg-white hover:bg-gray-100 font-semibold px-2 border border-gray-400 rounded">
                            Edit
                        </button>
                    </div>
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
    </div>
</x-popupweb-layout>