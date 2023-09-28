@props(['tasks', 'card'])

<ul id="dropzone-{{ $card->id }}" data-id="{{ $card->id }}" class="dropzone flex flex-col space-y-6 h-full py-4 items-center">
    @foreach ($tasks as $task)
        <x-todo.card-item :task="$task" />
    @endforeach
</ul>