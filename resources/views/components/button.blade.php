@props([
    'color' => 'bg-blue-600',
    'textColor' => 'text-white',
    'label' => null,
])

@php
$buttonClasses = $color . ' ' . $textColor;
@endphp

<button {{ $attributes->merge([
    'class' => 'px-4 py-2 ' . $buttonClasses,
]) }}>
    {{ $label }}
</button>
