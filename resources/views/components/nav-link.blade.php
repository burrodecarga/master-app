@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-orange-900 text-lg  leading-5 text-white focus:outline-none focus:border-yellow-900 transition font-light'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg leading-5 text-white hover:text-white hover:border-orange-900 focus:outline-none focus:text-gray-700 focus:border-orange-900 transition font-light';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
