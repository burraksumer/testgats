@props([
    'placeholder' => null,
    'id' => null,
    'name' => null,
    'required' => true,
    'type' => 'text',
    'value' => '',
])

<div class="w-full max-w-full mx-auto">
    <textarea
        class="flex w-full h-auto min-h-[200px] px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50"
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        required="{{ $required }}"
        placeholder="{{ $placeholder }}"
    >{{ $value }}</textarea>
</div>
