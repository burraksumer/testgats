@props([
    'name' => null,
    'username' => null,
    'email' => null,
    'avatar' => null,
])

<div class="w-full max-w-sm p-10 bg-white border rounded-lg shadow-sm border-neutral-200/60">

    <div class="flex items-center justify-center w-10 h-10 mx-auto mb-5">
        <div class="flex items-center justify-center w-10 h-10 mx-auto bg-gray-200 rounded-full">
            <span class="font-semibold text-gray-700 text-md">{{ $avatar }}</span>
        </div>
    </div>

    <div class="flex flex-col gap-2 mb-5">
        <h5 class="leading-none tracking-tight text-neutral-900"> {{ $name }} </h5>
        <h5 class="leading-none tracking-tight text-neutral-900">{{ '@' . $username }} </h5>
        <h5 class="leading-none tracking-tight text-neutral-900"> {{ $email }} </h5>
    </div>

    {{ $slot }}
</div>
