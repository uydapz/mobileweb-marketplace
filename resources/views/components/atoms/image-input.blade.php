@props([
    'name',
    'label' => '',
    'value' => null, // gambar lama, untuk edit
    'uniq' => null, // tambahan untuk ID unik, optional
])

@php
    $previewId = $name . '-preview' . ($uniq ?? '');
@endphp

<div class="form-group relative mb-4">
    @if ($label)
        <label for="{{ $name }}" class="form-label fw-bold">
            {{ $label }}
        </label>
    @endif

    <!-- Preview gambar -->
    <div class="mb-2">
        <img id="{{ $previewId }}" src="{{ $value ?? '#' }}" alt="{{ $name }}" class="img-fluid rounded"
            style="max-height:150px; border: 1px dashed #ccc; display: {{ $value ? 'block' : 'block' }};">
    </div>

    <!-- Input File -->
    <input type="file" name="{{ $name }}" id="{{ $name }}{{ $uniq ?? '' }}" class="form-control"
        onchange="previewImage(this, '{{ $previewId }}')">

    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
