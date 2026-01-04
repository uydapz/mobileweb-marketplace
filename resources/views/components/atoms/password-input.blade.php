@props([
    'id',
    'name',
    'label' => null,
    'placeholder' => '',
    'required' => false,
    'autocomplete' => 'current-password',
])

<div class="form-group relative mb-4">
    @if ($label)
        <label for="{{ $name }}" class="form-label block font-medium text-sm">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input id="{{ $id }}" name="{{ $name }}" type="password" placeholder="{{ $placeholder }}"
            @if ($required) required @endif autocomplete="{{ $autocomplete }}"
            {{ $attributes->merge(['class' => 'form-control pr-10']) }}>
    </div>
</div>
