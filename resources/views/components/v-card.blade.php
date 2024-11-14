@props([
    'title' => null,
    'content' => null,
    'date' => null,
    'buttonText' => null,
    'buttonLink' => null,
])

<div class="max-w-full mt-6 bg-white border rounded-lg shadow-sm min-h-20 p-7 border-neutral-200/60">

    <h2 class="mt-0 mb-3 text-xl font-semibold leading-none tracking-tight text-neutral-900"> @decode($title) <small
            class='text-sm font-normal text-neutral-500'
        >-
            {{ $date }} </small> </h2>
    <p class="mb-3 leading-7 text-neutral-500"> @decode($content) </p>
    {{ $slot }}

</div>
