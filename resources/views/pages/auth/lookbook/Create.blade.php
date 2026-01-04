<x-DashLayout :title="__('msg.add_lookbook')">
    <x-atoms.header-dashboard title="Tambah Lookbook" />
    <x-atoms.alert />

    <form action="{{ route('lookbook.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <x-atoms.text-input label="Judul" name="title" class="title-input" :value="old('title')" required />
        <x-atoms.text-input label="Slug" name="slug" :value="old('slug')" readonly />
        <x-atoms.textarea label="Deskripsi" name="description" editor="true">{{ old('description') }}</x-atoms.textarea>
        <x-atoms.image-input label="Cover Image" name="cover_image" :uniq="time()" />

        <x-atoms.select-input label="Collections" name="collections[]" 
            :options="$collections->pluck('name', 'id')" multiple="true" />

        <div class="mt-3">
            <x-atoms.button type="submit" color="warning" class="text-dark">Simpan</x-atoms.button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const title = document.querySelector('.title-input');
            const slug = document.querySelector('input[name="slug"]');
            title?.addEventListener('input', function() {
                slug.value = this.value.toLowerCase().trim()
                    .replace(/[^\w\s-]/g, '').replace(/\s+/g, '-');
            });
        });
    </script>
</x-DashLayout>
