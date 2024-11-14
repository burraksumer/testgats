@props([
    'successMessage' => null,
])

<div
    class="transition-opacity duration-1000 w-full max-w-xs min-w-80 rounded-lg border border-transparent bg-green-500 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-white"
    x-data="{ show: false }"
    x-init="setTimeout(() => {
        show = true;
        setTimeout(() => show = false, 3000);
    }, 100)"
    {{-- Fade in after 100ms, display for 3000ms, then fade out --}}
    x-bind:class="{ 'opacity-100': show, 'opacity-0': !show }"
>
    <svg
        class="w-5 h-5 -translate-y-0.5"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
        />
    </svg>
    <h5 class="mb-1 font-medium leading-none tracking-tight">Success</h5>
    <div class="text-sm opacity-80">{{ $successMessage }}</div>
</div>
