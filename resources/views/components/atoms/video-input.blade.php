@props([
    'name',
    'label' => '',
    'value' => null, // video lama
    'uniq' => null,  // tambahan unik untuk ID
])

@php
    $previewId = $name . '-preview' . ($uniq ?? '');
@endphp

<div class="form-group mb-4">
    @if ($label)
        <label for="{{ $name }}" class="form-label fw-bold">{{ $label }}</label>
    @endif

    <!-- Video Preview -->
    <div class="mb-2">
        <video id="{{ $previewId }}" controls class="w-100 rounded"
            style="max-height:300px; border:1px dashed #ccc; display: {{ $value ? 'block' : 'none' }};">
            @if($value)
                <source src="{{ asset('storage/' . $value) }}" type="video/mp4">
            @endif
        </video>
    </div>

    <!-- Input File -->
    <input type="file" name="{{ $name }}" id="{{ $name }}{{ $uniq ?? '' }}" class="form-control"
        accept="video/*" onchange="previewVideo(this, '{{ $previewId }}')">
</div>

@push('scripts')
<script>
function previewVideo(input, previewId) {
    const preview = document.getElementById(previewId);
    if(input.files && input.files[0]){
        const file = input.files[0];
        const url = URL.createObjectURL(file);
        preview.src = url;
        preview.style.display = 'block';
        preview.load();
    }
}
</script>
@endpush