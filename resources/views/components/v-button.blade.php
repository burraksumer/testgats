@props(['type', 'href', 'className' => '', 'variant' => 'dark', 'iconName' => null, 'iconNameEnd' => null])

@php
    $buttonClasses = [
        'dark' =>
            'inline-flex items-center justify-left px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none h-10 w-full min-w-44',
        'white' =>
            'inline-flex items-center justify-left px-4 py-2 text-sm font-medium tracking-wide transition-colors duration-200 bg-white rounded-md text-neutral-500 hover:text-neutral-700 border-neutral-200/70 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-200/60 focus:shadow-outline w-full h-10 min-w-44',
    ];
    $class = $buttonClasses[$variant] ?? $buttonClasses['white'];
@endphp

<button {{ $attributes->merge(['type' => $type ?? 'button', 'class' => $class . ' ' . $className]) }}>
    @isset($iconName)
        <x-v-icon name='{{ $iconName }}' />
    @endisset
    {{ $slot }}
    @isset($iconNameEnd)
        <x-v-icon
            class='ml-auto mr-0'
            name='{{ $iconNameEnd }}'
        />
    @endisset
</button>
