@props([
    'name' => null,
    'id' => null,
    'placeholder' => null,
    'fullWidth' => false,
    'color' => 'bg-gray-200',
    'value' => null,
])

@php
$classes = [];

if ($color) {
    $classes[] = $color;
}
if ($fullWidth) {
    $classes[] = 'w-full';
}

$classes = implode(' ', $classes);
@endphp

<div>
    <textarea
        {{ $attributes->merge([
            'cols' => '25',
            'rows' => '4',
            'name' => $name,
            'id' => $id ?? $name,
            'placeholder' => $placeholder,
            'class' => 'text-sm text-black border border-gray-300 py-2 px-4 ' . $classes,
        ]) }}
    >
        {{ $name ? old($name, $value) : $value }}
    </textarea>
    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
    @enderror
</div>
