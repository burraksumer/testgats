@props([
    'errorCode' => null,
    'error' => null,
])

<div
    class="transition-opacity relative duration-1000 w-full max-w-xs min-w-80 rounded-lg border border-transparent text-red-50 p-4 bg-red-600 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 mb-3"
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
            d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"
        />
    </svg>
    <h5 class="mb-1 font-medium leading-none tracking-tight">{{ $errorCode }}</h5>
    <div class="text-sm opacity-80">{{ $error }}</div>
</div>
