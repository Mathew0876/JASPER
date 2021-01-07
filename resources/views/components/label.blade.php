@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm font-sans-roboto text-gray-200']) }}>
    {{ $value ?? $slot }}
</label>
