<x-popupweb-layout>
    <div class="p-2 space-y-8 w-[90vw]">
        <div id="title" class="flex w-full">
            <div class="px-4 flex justify-center items-center">
                <x-icons.plus />
            </div>
            <div class="w-[50vw]">
                <input type="text" name="name" id="name" class="w-full border border-gray-400 rounded px-2 py-1" placeholder="Enter name" value="New task">
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
                <textarea rows="5" name="description" id="description" class="w-full border border-gray-400 rounded px-2 py-1 resize-y" placeholder="Enter description"></textarea>
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
                <input type="date" id="due_date" name="due_date" class="w-full border border-gray-400 rounded px-2 py-1" placeholder="Enter name" value="New task">
            </div>
        </div>


        <div id="labels" class="flex w-full">
            <?php 
                $labels = [
                    0 => [
                        'name' => 'Bug',
                        'color' => 'tomato'
                    ],
                    1 => [
                        'name' => 'Feature',
                        'color' => 'lightgreen'
                    ],
                    2 => [
                        'name' => 'Enhancement',
                        'color' => 'lightblue'
                    ]
                ];
            ?>
            <div class="px-4 flex justify-center items-center">
                <x-icons.labels />
            </div>
            <div class="space-y-2">
                @foreach ($labels as $id => $label)
                    <div class="flex space-x-1 items-center">
                        <input type="checkbox" name="label-{{ $id }}" id="label-{{ $id }}">
                        <x-todo.label :name="$label['name']" :color="$label['color']" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-popupweb-layout>