@props([
    'placeholder' => null,
    'id' => null,
    'name' => null,
    'required' => true,
    'type' => 'text',
    'value' => '',
    'label' => null,
])

<div class="w-full max-w-full mx-auto">
    @if ($label)
        <label class="block mb-0 ml-3 text-sm font-bold text-gray-700 "> {{ $label }} </label>
    @endif
    <input
        {{ $attributes->merge([
            'class' =>
                'flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50',
            'id' => $id,
            'name' => $name,
            'type' => $type,
            'value' => $value,
            'required' => $required,
            'placeholder' => $placeholder,
        ]) }}
    />
</div>
