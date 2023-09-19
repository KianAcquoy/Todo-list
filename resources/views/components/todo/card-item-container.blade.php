@props(['tasks', 'card'])

<ul id="dropzone-{{ $card->id }}" data-id="{{ $card->id }}" class="dropzone flex flex-col space-y-5 h-full mt-2 my-8 items-center">
    @foreach ($tasks as $task)
        <x-todo.card-item :task="$task" />
    @endforeach
</ul>