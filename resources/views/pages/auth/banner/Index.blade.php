<x-DashLayout :title="__('msg.banner')">
    <x-atoms.alert />
    <div class="dashboard-collection container py-4">
        <!-- Header -->
        <x-atoms.header-dashboard title="{{ __('msg.banner') }}" />

        <div class="card shadow-sm rounded-4 p-4 mt-3">
            @if ($banner && $banner->video)
                <video width="100%" height="auto" controls class="rounded shadow-sm">
                    <source src="{{ asset('storage/' . $banner->video) }}" type="video/mp4">
                    Browser kamu tidak mendukung tag video.
                </video>
            @else
                <span class="text-muted">Belum ada video banner</span>
            @endif

            <div class="d-flex gap-2 mt-3">
                <x-atoms.button target="editBannerModal" icon="fas fa-edit" label="{{ __('msg.edit') }}" color="primary" />
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <x-atoms.modal id="editBannerModal" title="{{ __('msg.edit') }} Banner">
        
        <form action="{{ route('banner.update', $banner->id ?? 0) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            {{-- Gunakan komponen video-input --}}
            <x-atoms.video-input 
                label="Upload Video" 
                name="video" 
                :value="$banner->video ?? null" 
            />

            <div class="modal-footer p-0 mt-3">
                <x-atoms.button type="button" color="secondary" dismiss="true">{{ __('msg.close') }}</x-atoms.button>
                <x-atoms.button type="submit" color="primary">{{ __('msg.save') }}</x-atoms.button>
            </div>
        </form>
    </x-atoms.modal>
</x-DashLayout>