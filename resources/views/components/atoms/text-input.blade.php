@props([
    'type' => 'text',
    'name' => '',
    'label' => '',
    'id' => null,
    'value' => '',
    'autofocus' => false,
    'readonly' => false,
    'required' => false,
])
<div class="form-group relative mb-4">
    @if ($label)
        <label for="{{ $name }}" class="form-label fw-bold">
            {{ $label }}
        </label>
    @endif
    <div class="relative">

        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $value) }}" @if ($readonly) readonly @endif @if ($autofocus) autofocus @endif
            @if ($required) required @endif {{ $attributes->merge(['class' => 'form-control']) }} />
    </div>
</div>
