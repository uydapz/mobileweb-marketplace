<x-DashLayout :title="__('msg.add_featured')">
    <div class="dashboard-header">
        <x-atoms.header-dashboard title="{{ __('msg.add_featured') }}" />
        <x-atoms.alert />
        <x-atoms.href :href="route('featured-design.index')" label="{{ __('msg.back') }}" class="text-brown fw-bold" />
    </div>

    <form action="{{ route('featured-design.store') }}" method="POST" class="mt-4">
        @csrf

        <x-atoms.text-input 
            label="{{ __('msg.theme') }}" 
            name="theme" 
            type="text" 
            placeholder="{{ __('msg.theme_placeholder') }}" 
            :value="old('theme')" 
            required 
        />

        <x-atoms.textarea 
            label="{{ __('msg.description') }}" 
            name="description" 
            editor="true" row="10"
        >{{ old('description') }}</x-atoms.textarea>

        <div class="mt-4 d-flex justify-content-end gap-2">
            <x-atoms.button type="submit" color="primary">
                <i class="fas fa-save me-1"></i> {{ __('msg.save') }}
            </x-atoms.button>
        </div>
    </form>

    <style>
        .dashboard-header {
            margin-bottom: 1.5rem;
        }
    </style>
</x-DashLayout>
