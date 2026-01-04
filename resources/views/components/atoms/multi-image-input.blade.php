@props([
    'name',
    'label' => '',
    'value' => null, // bisa string JSON, array, atau single path
    'uniq' => null,  // opsional, untuk ID unik di modal edit
])

@php
    // Buat ID unik untuk preview container
    $previewId = $name . '-preview' . ($uniq ?? '');

    // Pastikan $value selalu array
    $images = [];
    if (is_string($value)) {
        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            $images = $decoded;
        } else {
            $images = [$value]; // kalau cuma satu path string
        }
    } elseif (is_array($value)) {
        $images = $value;
    }
@endphp

<div class="form-group mb-4">
    @if ($label)
        <label class="form-label fw-bold">{{ $label }}</label>
    @endif

    <!-- Preview Container -->
    <div id="{{ $previewId }}" class="d-flex flex-wrap gap-2 mb-3">
        @forelse ($images as $img)
            <div class="position-relative">
                <img src="{{ asset('storage/' . $img) }}" alt="preview" class="rounded border"
                    style="width:100px; height:100px; object-fit:cover;">
            </div>
        @empty
            <p class="text-muted small">Belum ada gambar</p>
        @endforelse
    </div>

    <!-- Input file multiple -->
    <input type="file" name="{{ $name }}[]" multiple class="form-control"
        onchange="previewMultiImages(event, '{{ $previewId }}')" accept="image/*">
</div>

<script>
    function previewMultiImages(event, previewId) {
        const preview = document.getElementById(previewId);
        preview.innerHTML = '';
        Array.from(event.target.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'rounded border me-2 mb-2';
                img.style = 'width:100px; height:100px; object-fit:cover;';
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
</script>
