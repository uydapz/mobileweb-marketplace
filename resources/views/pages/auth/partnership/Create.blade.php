<x-DashLayout :title="__('msg.create') . ' ' . __('msg.partnership')">
    <div class="dashboard-header">
        <x-atoms.header-dashboard
            title="{{ __('msg.product') }} / {{ __('msg.partnership') }} / {{ __('msg.add') }} {{ __('msg.partnership') }}" />
        <x-atoms.alert />
        <x-atoms.href :href="route('partnership.index')" label="{{ __('msg.back') }}" class="text-brown fw-bold" />
    </div>
    <form action="{{ route('partnership.store') }}" method="POST" enctype="multipart/form-data" class="form-koleksi">
        @csrf
        <x-atoms.text-input type="text" placeholder="{{ __('msg.partner_name') }}" label="{{ __('msg.partner_name') }}"
            name="partner_name" id="partner_name" :value="old('partner_name')" required />
        <x-atoms.text-input type="text" placeholder="{{ __('https://websitemitra.com') }}"
            label="{{ __('msg.website') }}" name="website" id="website" :value="old('website')" required />
        <x-atoms.image-input label="{{ __('msg.logo') }}" name="logo" />
        <!-- Tombol -->
        <div class="form-actions">
            <x-atoms.button type="submit" color="primary" icon="fas fa-save">
                {{ __('msg.save') }}
            </x-atoms.button>
        </div>

    </form>
</x-DashLayout>
