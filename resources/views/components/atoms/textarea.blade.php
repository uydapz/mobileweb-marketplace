@props(['label' => '', 'name', 'id' => null, 'editor' => false])

<div class="form-group mt-2 mb-2">
    @if ($label)
        <label for="{{ $id ?? $name }}" class="form-label fw-bold">{{ $label }}</label>
    @endif

    @php
        $value = old($name) ?: $slot;
    @endphp

    <textarea
        name="{{ $name }}"
        id="{{ $id ?? $name }}"
        {{ $attributes->merge(['class' => 'form-control border rounded-lg p-3 w-100']) }}
    >{{ $value }}</textarea>

    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

@if ($editor)
    <link href="https://cdn.jsdelivr.net/npm/suneditor/dist/css/suneditor.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/suneditor/dist/suneditor.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const textareaId = '{{ $id ?? $name }}';
        const editor = SUNEDITOR.create(textareaId, {
            height: '400px',
            buttonList: [
                ['undo', 'redo'],
                ['bold', 'italic', 'underline', 'strike'],
                ['align', 'list', 'table'],
                ['link', 'image', 'video'],
                ['codeView']
            ],
            placeholder: 'Tulis konten di sini...',
        });

        // ✅ Pastikan SunEditor sinkron dengan textarea
        editor.onChange = function(contents) {
            document.getElementById(textareaId).value = contents;
        };
    });
    </script>
@endif
