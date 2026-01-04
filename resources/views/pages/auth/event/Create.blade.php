<x-DashLayout :title="__('msg.event_create')">
    <div class="dashboard-header">
        <x-atoms.header-dashboard title="{{ __('msg.event') }} / {{ __('msg.add') }} {{ __('msg.event') }}" />
        <x-atoms.alert />
        <x-atoms.href :href="route('event.index')" label="{{ __('msg.back') }}" class="text-brown fw-bold" />
    </div>

    <!-- Form -->
    <form action="{{ route('event.store') }}" method="POST">
        @csrf

        <!-- Judul -->
        <x-atoms.text-input label="{{ __('msg.title') }}" placeholder="{{ __('msg.title') }}" name="title" :value="old('title')" required />

        <!-- Deskripsi -->
        <x-atoms.textarea label="{{ __('msg.description') }}" editor="true" name="description">
            {{ old('description') }}
        </x-atoms.textarea>

        <!-- Tanggal -->
        <x-atoms.text-input label="{{ __('msg.start_date') }}" type="datetime-local" name="start_date" :value="old('start_date')"
            required />
        <x-atoms.text-input label="{{ __('msg.end_date') }}" type="datetime-local" name="end_date" :value="old('end_date')" />

        <!-- Lokasi -->
        <x-atoms.text-input label="{{ __('msg.location') }}" placeholder="{{ __('msg.location') }}" name="location" :value="old('location')" />

        <!-- Actions -->
        <div class="mt-4 d-flex justify-content-end gap-2">
            <x-atoms.href :href="route('event.index')" label="{{ __('msg.back') }}" class="btn btn-secondary" />
            <x-atoms.button type="submit" color="primary">
                <i class="fas fa-save me-1"></i> {{ __('msg.save') }}
            </x-atoms.button>
        </div>
    </form>
</x-DashLayout>
