<x-DashLayout :title="__('msg.add_story')">
    <x-atoms.alert />

    <div class="dashboard-collection container py-4">
        <x-atoms.header-dashboard title="{{ __('msg.add_story') }}" />

        <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <x-atoms.text-input 
                label="{{ __('msg.title') }}" 
                name="title" 
                class="title-input" 
                :value="old('title')" 
                required 
            />
            <x-atoms.textarea 
                label="{{ __('msg.content') }}" 
                name="content" 
                id="content" 
                editor="true"
            >{{ old('content') }}</x-atoms.textarea>

            <!-- Image -->
            <x-atoms.image-input 
                label="{{ __('msg.image') }}" 
                name="image" 
                :value="null" 
                :uniq="time()" 
            />

            <div class="mt-3 d-flex gap-2">
                <x-atoms.button type="submit" color="warning" class="text-dark">
                    {{ __('msg.save') }}
                </x-atoms.button>
            </div>
        </form>
    </div>
</x-DashLayout>
