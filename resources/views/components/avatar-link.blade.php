@props([
    'href',
    'name' => null,
    'title' => null,
    'className' => '',
    'variant' => null,
    'imgURL' => null,
    'imgAlt' => null,
])

@php
    $avatarLinkButtonClasses = [
        'dark' =>
            'inline-flex items-center justify-left px-4 py-2 text-sm font-medium tracking-wide text-white no-underline transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none w-full',
        'white' =>
            'inline-flex items-center justify-left px-4 py-2 text-sm font-medium tracking-wide transition-colors duration-200 bg-white  rounded-md text-neutral-500 hover:text-neutral-700 border-neutral-200/70 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-200/60 focus:shadow-outline no-underline w-full text-inherit',
    ];
    $class = $avatarLinkButtonClasses[$variant] ?? $avatarLinkButtonClasses['white'];

@endphp

<a
    class='{{ $class }} {{ $className }}'
    href="{{ route($href) }}"
    wire:navigate
>
    <div class="flex flex-row items-center justify-center">
        @isset($imgURL)
            <div class="flex items-center justify-center w-10 h-10 mr-4">
                <div class="flex items-center justify-center w-10 h-10 m-0 bg-gray-200 rounded-full">
                    <span class="font-semibold text-gray-700 text-md">B</span>
                </div>
                @if ($imgURL)
                    <img
                        class="m-0 rounded-full"
                        src="{{ $imgURL }}"
                        alt="{{ $imgAlt }}"
                        onload="this.previousElementSibling.style.display='none';"
                    >
                @endif

            </div>
        @endisset

        <div class="flex flex-col justify-center">
            <p class="m-0 font-bold"> {{ $name }} </p>
            <p class="m-0"> {{ $title }} </p>
        </div>
    </div>
</a>
