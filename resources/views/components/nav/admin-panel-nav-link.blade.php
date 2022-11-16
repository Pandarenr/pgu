@props(['active'])

@php
$classes = ($active ?? false)
            ? 'my-2 py-2 text-lg font-medium flex-1 flex justify-left content-center text-blue-700 border-r border-blue-700'
            : 'my-2 py-2 text-lg font-medium flex-1 flex justify-left content-center hover:text-blue-500 hover:border-r hover:border-blue-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>