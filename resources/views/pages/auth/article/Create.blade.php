<x-DashLayout :title="__('msg.add_article')">
    <x-atoms.alert />

    <div class="dashboard-collection container py-4">
        <x-atoms.header-dashboard title="{{ __('msg.add_article') }}" />

        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <x-atoms.text-input label="{{ __('msg.title') }}" name="title" class="title-input" :value="old('title')"
                required />

            <!-- Slug (readonly, otomatis) -->
            <x-atoms.text-input label="{{ __('msg.slug') }}" name="slug" :value="old('slug')" readonly />

            <!-- Content -->
            <x-atoms.textarea label="{{ __('msg.content') }}" name="content" id="content"
                editor="true">{{ old('content') }}</x-atoms.textarea>

            <!-- Image -->
            <x-atoms.image-input label="{{ __('msg.image') }}" name="image" :value="null" :uniq="time()" />

            <div class="mt-3 d-flex gap-2">
                <x-atoms.button type="submit" color="warning" class="text-dark">{{ __('msg.save') }}</x-atoms.button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-generate slug dari title
            const titleInput = document.querySelector('.title-input');
            const slugInput = document.querySelector('input[name="slug"]');

            titleInput?.addEventListener('input', function() {
                let slug = this.value.toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-');
                slugInput.value = slug;
            });
        });
    </script>
</x-DashLayout>
