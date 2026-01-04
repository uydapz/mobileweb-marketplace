@props(['id', 'name', 'label'])

<div class="flex items-center">
    <input id="{{ $id }}" type="checkbox" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'rounded border-gray-300 text-blue-600 focus:ring-blue-500']) }}>
    <label for="{{ $id }}" class="ms-2 text-sm text-gray-600">{{ $label }}</label>
</div>
