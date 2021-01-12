@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex justify-center p-4 text-lg font-sans-roboto text-white focus:outline-none transition duration-150 ease-in-out bg-jasper-purple no-underline'
            : 'flex justify-center p-4 text-lg font-sans-roboto text-white
            hover:bg-jasper-purple focus:outline-none transition duration-150 ease-in-out no-underline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
