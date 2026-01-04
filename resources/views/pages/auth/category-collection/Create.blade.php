<x-DashLayout :title="__('msg.create') . ' ' . __('msg.category') .' ' .__('msg.collection')">
    <div class="dashboard-header">
        <x-atoms.header-dashboard
            title="{{ __('msg.product') }} / {{ __('msg.category') }} {{ __('msg.collection') }} / {{ __('msg.add') }} {{ __('msg.category') }} {{ __('msg.collection') }}" />
        <x-atoms.alert />
       <x-atoms.href :href="route('category-collection.index')" label="{{ __('msg.back') }}" class="text-brown fw-bold" />
    </div>
    <form action="{{ route('category-collection.store') }}" method="POST" enctype="multipart/form-data" class="form-koleksi">
        @csrf
        <x-atoms.text-input placeholder="{{ __('msg.name') }}" label="{{ __('msg.name') }}" name="name" id="name"
            :value="old('name')" required autofocus />
      

        <!-- Tombol -->
        <div class="form-actions">
            <x-atoms.button type="submit" color="primary" icon="fas fa-save">
                {{ __('msg.save') }}
            </x-atoms.button>
        </div>

    </form>
</x-DashLayout>
