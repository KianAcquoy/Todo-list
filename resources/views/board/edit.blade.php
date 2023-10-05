<x-popupweb-layout>
    <x-slot name="header">
        Settings of {{ $board->title }}
    </x-slot>
    <div class="px-2 space-y-2 py-4 w-[90vw]">
        <div id="title" class="flex w-full">
            <div class="px-4 flex justify-center items-center">
                <x-icons.floppydisk />
            </div>
            <div class="space-y-2 w-full">
                <label for="name" class="font-semibold relative">
                    Name
                </label>
                <form action="{{ route('boards.update', $board->id) }}" method="POST" class="w-full flex flex-col space-y-2">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="card_id" value="1">
                    <input type="text" name="title" id="title" class="w-full border border-gray-400 rounded px-2 py-1 @error('title') border-red-500 @enderror" placeholder="Enter name" value="{{ $board->title }}">
                    @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 py-1 rounded flex items-center">
                            <div class="pr-1 fill-white">
                                <x-icons.floppydisk />
                            </div>
                            Save name
                        </button>
                    </div>
                </form>
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div id="description" class="flex w-full">
            <div class="px-4 flex justify-center items-center">
                <x-icons.paragraph />
            </div>
            <div class="space-y-2 w-full">
                <form action="{{ route('boards.update', $board->id) }}" method="POST" class="w-full flex flex-col space-y-2">
                    @csrf
                    @method('PUT')
                    <label for="description" class="font-semibold relative">
                        Description
                    </label>
                    <textarea rows="3" name="description" id="description" class="w-full border border-gray-400 rounded px-2 py-1 resize-y @error('title') border-red-500 @enderror" placeholder="Enter description">{{ old('description', $board->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 py-1 rounded flex items-center">
                            <div class="pr-1 fill-white">
                                <x-icons.floppydisk />
                            </div>
                            Save description
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="labels" class="flex w-full">
            <div class="px-4 flex justify-center items-center">
                <x-icons.labels />
            </div>
            <div class="space-y-2 w-full">
                <label for="labels[]" class="font-semibold relative">
                    Labels
                </label>
                @foreach ($board->labels as $label)
                    <div class="flex space-x-1 items-center">
                        <x-todo.label :name="$label->name" :color="$label->color" :icon="$label->icon" />
                        <form action="{{ route('labels.destroy', $label->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600 font-semibold">
                                <x-icons.trash />
                            </button>
                        </form>
                    </div>
                @endforeach
                <form action="{{ route('labels.store', $board->id) }}" method="POST" class="w-full">
                    @csrf
                    @method('PUT')
                    <label for="name" class="font-semibold relative">
                        New label
                    </label>
                    <div class="flex w-full items-center">
                        <input type="text" name="name" id="name" class="w-[25vw] border border-gray-400 rounded px-2 mr-2 py-1 @error('name') border-red-500 @enderror" placeholder="Enter name">
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                        <input type="color" name="color" id="color" class="w-[25vw] border border-gray-400 rounded px-2 mr-2 py-1 @error('color') border-red-500 @enderror" placeholder="Enter color" value="{{ old('color', '#e3dfd5') }}">
                        @error('color')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="w-fit bg-blue-500 hover:bg-blue-600 text-white font-semibold px-2 rounded flex items-center">
                            <div class="pr-1 fill-white">
                                <x-icons.floppydisk />
                            </div>
                            Add label
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-popupweb-layout>