@props(['label', 'name', 'options' => [], 'selected' => ''])

<div class="form-group relative mb-4">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select class="form-select" id="{{ $name }}" name="{{ $name }}" {{ $attributes }}>
        <option value="" disabled {{ $selected == '' ? 'selected' : '' }}>Select an option</option>
        @foreach($options as $value => $text)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>
</div>
