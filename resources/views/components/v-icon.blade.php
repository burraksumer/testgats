@props([
    'name' => '',
    'width' => '16',
    'height' => '16',
    'class' => '',
])

<svg
    class="mr-2 {{ $class }}"
    width="{{ $width }}"
    height="{{ $height }}"
>
    <use href="{{ asset("/icons/icons.svg#$name") }}" />
</svg>
