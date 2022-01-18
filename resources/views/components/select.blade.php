@props([
    'name' => null,
    'id' => null,
    'label' => null,
    'fullWidth' => false,
    'color' => 'bg-gray-200',
    'value' => null,
])

@php
$classes = [];

$id = $id ?? $name;

if ($color) {
    $classes[] = $color;
}
if ($fullWidth) {
    $classes[] = 'w-full';
}

$classes = implode(' ', $classes);
@endphp

<div>
    <label
        class="text-sm mr-1"
        for="{{ $id }}"
    >
        {{ $label }}
    </label>
    <select
        {{ $attributes->merge([
            'name' => $name,
            'id' => $id,
            'value' => $name ? old($name, $value) : $value,
            'class' => 'text-sm text-black border border-gray-300 h-10 py-2 px-4 ' . $classes,
        ]) }}
    >
        {{ $slot }}
    </select>
    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
    @enderror
</div>
