@props(['name', 'color', 'icon' => null])

<div class="label px-4 w-fit rounded-xl flex space-x-1 items-center cursor-pointer" style="background-color: {{ $color }};">
    @if ($icon)
        @include('components.icons.' . $icon)
    @endif
    <div>
        {{ $name }}
    </div>
</div>