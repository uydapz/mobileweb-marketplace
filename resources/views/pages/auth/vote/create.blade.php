<x-DashLayout :title="__('msg.create') . ' ' . __('msg.vote')">
    <div class="dashboard-header">
        <x-atoms.header-dashboard title="{{ __('msg.vote') }} / {{ __('msg.add') }} {{ __('msg.event') }}" />
        <x-atoms.alert />
        <x-atoms.href :href="route('vote.index')" label="{{ __('msg.back') }}" class="text-brown fw-bold" />
    </div>

    <form action="{{ route('vote.store') }}" method="POST" enctype="multipart/form-data" class="form-vote">
        @csrf

        <x-atoms.text-input label="{{ __('msg.title') }}" placeholder="{{ __('msg.vote_title_placeholder') }}"
            name="title" id="title" :value="old('title')" required />

        <x-atoms.textarea label="{{ __('msg.description') }}" name="description"
            editor="true">{{ old('description') }}</x-atoms.textarea>

        <x-atoms.text-input type="datetime-local" label="{{ __('msg.start_at') }}" name="start_at" id="start_at"
            :value="old('start_at')" required />

        <x-atoms.text-input type="datetime-local" label="{{ __('msg.end_at') }}" name="end_at" id="end_at"
            :value="old('end_at')" required />

        <div id="collections-preview" class="d-flex flex-wrap gap-2 mb-3"></div>
        <select id="collections-select" name="collections[]" multiple class="form-select">
            @foreach ($collections as $collection)
                <option value="{{ $collection->id }}"
                    {{ in_array($collection->id, old('collections', [])) ? 'selected' : '' }}>
                    {{ $collection->name }}
                </option>
            @endforeach
        </select>

        @push('scripts')
            <script>
                const select = document.getElementById('collections-select');
                const previewContainer = document.getElementById('collections-preview');

                // Mapping id → url gambar dari $collections object
                const collectionImages = {
                    @foreach ($collections as $collection)
                        "{{ $collection->id }}": "{{ asset('storage/' . $collection->image) }}",
                    @endforeach
                };

                function updatePreview() {
                    previewContainer.innerHTML = '';
                    const selectedOptions = Array.from(select.selectedOptions).map(opt => opt.value);

                    selectedOptions.forEach(id => {
                        if (collectionImages[id]) {
                            const img = document.createElement('img');
                            img.src = collectionImages[id];
                            img.alt = "Preview";
                            img.style.width = '100px';
                            img.style.height = '100px';
                            img.style.objectFit = 'cover';
                            img.classList.add('rounded');
                            previewContainer.appendChild(img);
                        }
                    });
                }

                select.addEventListener('change', updatePreview);
                updatePreview(); // preview awal jika ada old input
            </script>
        @endpush

        <!-- Aktif atau tidak -->
        <div class="form-check mt-3">
            <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input"
                {{ old('is_active', true) ? 'checked' : '' }}>
            <label for="is_active" class="form-check-label">{{ __('msg.active_vote') }}</label>
        </div>

        <!-- Tombol -->
        <div class="form-actions mt-4 d-flex justify-content-end gap-2">
            <x-atoms.button type="submit" color="primary" icon="fas fa-save">
                {{ __('msg.save') }}
            </x-atoms.button>
        </div>
    </form>
</x-DashLayout>
