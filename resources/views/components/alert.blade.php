@props(['iconName' => null])

<div
    class="relative w-full rounded-lg border bg-white p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-neutral-900 sm:flex">

    {{-- This is the right side of the alert --}}
    <x-v-icon
        class=""
        name='{{ $iconName }}'
    />
    <div class="w-1/2 h-full">
        <div class="flex flex-col text-left">
            <x-link>Song Title</x-link>
            <x-link>Song Name</x-link>
        </div>
    </div>
    <hr class="my-4 sm:hidden" />

    {{-- This is the left side of the alert --}}
    <div class="justify-end text-right sm:w-1/2">
        <div class="flex items-center w-full sm:justify-end">
            <div class="w-2 h-2 mr-2 bg-green-500 rounded-full"></div>
            <x-link
                external="https://512kb.club/"
                target='_blank'
            >512KB Club</x-link>
        </div>
        <div class="flex items-center w-full sm:justify-end">
            <div class="w-2 h-2 mr-2 bg-green-500 rounded-full"></div>
            <x-link
                external="https://512kb.club/"
                target='_blank'
            >512KB Club</x-link->
        </div>
    </div>
</div>
