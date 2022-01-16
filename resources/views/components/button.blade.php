@props([
    'color' => 'bg-gray-600',
    'textColor' => 'text-white',
    'label' => null,
])

@php
$buttonClasses = $color . ' ' . $textColor;
@endphp

<button {{ $attributes->merge([
    'class' => 'px-4 py-2 shadow-sm ' . $buttonClasses,
]) }}>
    {{ $label }}
</button>
