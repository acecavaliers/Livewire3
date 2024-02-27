@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-base text-gray-900 font-semibold rounded-md flex items-center p-2 bg-gray-100 group'
            : 'text-base text-gray-700 font-normal rounded-md flex items-center p-2 hover:bg-gray-100 group';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
