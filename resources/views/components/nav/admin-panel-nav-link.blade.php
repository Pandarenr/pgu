@props(['active'])

@php
$classes = ($active ?? false)
            ? 'my-2 py-2 text-lg font-medium flex-1 flex justify-left content-center bg-blue-500'
            : 'my-2 py-2 text-lg font-medium flex-1 flex justify-left content-center hover:bg-blue-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>