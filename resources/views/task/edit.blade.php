<x-popupweb-layout>
    <form class="px-2 space-y-6 py-4" action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="card_id" value="{{ $card->id }}">
        <div id="title" class="flex w-full">
            <div class="px-4 flex justify-center items-center">
                <x-icons.plus />
            </div>
            <div class="w-[50vw]">
                <input type="text" name="name" id="name" class="w-full border border-gray-400 rounded px-2 py-1 @error('title') border-red-500 @enderror" placeholder="Enter name" value="{{ $task->name }}">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <div class="text-md font-light">
                    in <a class="underline underline-offset-2">{{ $card->name }}</a>
                </div>
            </div>
        </div>
        <div id="description" class="flex w-full">
            <div class="px-4 flex justify-center items-center">
                <x-icons.paragraph />
            </div>
            <div class="space-y-2 w-full">
                <label for="description" class="font-semibold relative">
                    Description
                </label>
                <textarea rows="5" name="description" id="description" class="w-full border border-gray-400 rounded px-2 py-1 resize-y @error('description') border-red-500 @enderror" placeholder="Enter description">{{ $task->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
               @enderror
            </div>
        </div>
        <div id="duedate" class="flex w-full">
            <div class="px-4 flex justify-center items-center">
                <x-icons.calendarcheck />
            </div>
            <div class="space-y-2">
                <label for="due_date" class="font-semibold relative">
                    Due date
                </label>
                <input type="date" id="due_date" name="due_date" class="w-full border border-gray-400 rounded px-2 py-1 @error('due_date') border-red-500 @enderror" value="{{ Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}">
                @error('date')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div id="color" class="flex w-full">
            <div class="px-4 flex justify-center items-center">
                <x-icons.colors />
            </div>
            <div class="space-y-2">
                <label for="color" class="font-semibold relative">
                    Color
                </label>
                <input type="color" name="color" id="color" class="w-full border border-gray-400 rounded px-2 py-1 @error('color') border-red-500 @enderror" value="{{ $task->color }}">
                @error('color')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div id="labels" class="flex w-full">
            <div class="px-4 flex justify-center items-center">
                <x-icons.labels />
            </div>
            <div class="space-y-2">
                <label for="labels[]" class="font-semibold relative">
                    Labels
                </label>
                @foreach ($card->board->labels as $label)
                    <div class="flex space-x-1 items-center">
                        <input type="checkbox" name="labels[]" id="label-{{ $label->id }}" value="{{ $label->id }}" @if ($task->labels->contains($label->id)) checked @endif>
                        <x-todo.label :name="$label->name" :color="$label->color" :icon="$label->icon" />
                    </div>
                @endforeach
            </div>
        </div>

        <div class="fixed right-4 bottom-4 shadow-md">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 py-1 rounded flex items-center">
                <div class="pr-1 fill-white">
                    <x-icons.floppydisk />
                </div>
                Save
            </button>
        </div>
    </form>
</x-popupweb-layout>