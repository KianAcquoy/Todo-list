@props(['name', 'color', 'icon'])

<div class="label px-4 w-fit rounded-xl flex space-x-1 items-center cursor-pointer" style="background-color: {{ $color }};">
    @include('components.icons.' . $icon)
    <div>
        {{ $name }}
    </div>
</div>