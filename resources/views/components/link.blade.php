@props([
    'href' => null,
    'external' => null,
    'target' => null,
    'className' => '',
    'variant' => 'dark',
    'iconName' => null,
    'iconNameEnd' => null,
])

<a
    class='font-semibold text-gray-600 hover:text-gray-900 focus:outline focux:outline-1 focus:rounded-md focus:outline-ring-100 justify-self-center no-underline transition-colors duration-200 {{ $className }}'
    target={{ $target ?? '_self' }}
    @if ($href) href="{{ route($href) }}" @endif
    @if ($external) href="{{ $external }}" @endif
    @if (($target ?? '_self') !== '_blank') wire:navigate @endif
>
    @isset($iconName)
        <x-v-icon name='{{ $iconName }}' />
    @endisset
    {{ $slot }}
    @isset($iconNameEnd)
        <x-v-icon
            class='ml-auto'
            name='{{ $iconNameEnd }}'
        />
    @endisset
</a>
