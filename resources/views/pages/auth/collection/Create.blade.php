<x-DashLayout :title="__('msg.create') . ' ' . __('msg.collection')">
    <div class="dashboard-header">
        <x-atoms.header-dashboard
            title="{{ __('msg.product') }} / {{ __('msg.collection') }} / {{ __('msg.add') }} {{ __('msg.collection') }}" />
        <x-atoms.alert />
       <x-atoms.href :href="route('collection.index')" label="{{ __('msg.back') }}" class="text-brown fw-bold" />
    </div>
    <form action="{{ route('collection.store') }}" method="POST" enctype="multipart/form-data" class="form-koleksi">
        @csrf
        <x-atoms.text-input placeholder="{{ __('msg.name') }}" label="{{ __('msg.name') }}" name="name" id="name"
            :value="old('name')" required autofocus />
        <x-atoms.select-input label="{{ __('msg.category') }}" name="category_id" :options="$category_collections" selected="{{ old('category_id') }}" />
        <x-atoms.select-input label="{{ __('msg.featured_design') }}" name="featured_design_id" :options="$featured_designs" selected="{{ old('featured_design_id') }}" />
        <x-atoms.textarea label="{{ __('msg.description') }}" name="description" editor="true">
            {{ old('description') }}
        </x-atoms.textarea>

        <x-atoms.image-input label="{{ __('msg.image') }}" name="image" />

        <!-- Tombol -->
        <div class="form-actions">
            <x-atoms.button type="submit" color="primary" icon="fas fa-save">
                {{ __('msg.save') }}
            </x-atoms.button>
        </div>

    </form>
</x-DashLayout>
