<x-DashLayout :title="__('msg.story')">
    <x-atoms.alert />

    <div class="dashboard-collection container py-4">
        <!-- Header -->
        <x-atoms.header-dashboard title="{{ __('msg.story') }}" />

        <!-- Tombol tambah story -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('story.create') }}" class="btn btn-warning text-dark">
                <i class="fas fa-plus me-2"></i> {{ __('msg.add_story') }}
            </a>
        </div>

        <!-- Daftar story -->
        <div class="row">
            @forelse ($stories as $story)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($story->image)
                            <img src="{{ asset('storage/' . $story->image) }}" class="card-img-top"
                                alt="{{ $story->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $story->title }}</h5>
                            <p class="card-text text-truncate">{!! Str::limit($story->content, 100) !!}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <x-atoms.button target="editStoryModal-{{ $story->id }}" icon="fas fa-edit"
                                label="{{ __('msg.edit') }}" />
                            <x-atoms.button type="submit" color="danger" icon="fas fa-trash" :confirmDelete="true"
                                :form="route('story.destroy', $story->id)" method="DELETE" />
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">{{ __('msg.no_story_found') }}</p>
                </div>
            @endforelse
        </div>
    </div>
    @foreach ($stories as $story)
        <x-atoms.modal id="editStoryModal-{{ $story->id }}" title="{{ __('msg.edit_story') }}">
            <form action="{{ route('story.update', $story->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-atoms.text-input label="{{ __('msg.title') }}" name="title" class="title-input" :value="$story->title ?? old('title')"
                    required />
                <x-atoms.textarea label="{{ __('msg.content') }}" name="content" id="content-{{ $story->id }}"
                    editor="true">{{ $story->content ?? old('content') }}</x-atoms.textarea>
                <x-atoms.image-input label="{{ __('msg.image') }}" name="image" :value="$story->image ? asset('storage/' . $story->image) : null"
                    :uniq="$story->id" />
                <div class="modal-footer p-0 mt-3">
                    <x-atoms.button type="button" color="secondary" dismiss="true">
                        {{ __('msg.close') }}
                    </x-atoms.button>
                    <x-atoms.button type="submit" color="primary">
                        {{ __('msg.save') }}
                    </x-atoms.button>
                </div>
            </form>
        </x-atoms.modal>
    @endforeach

    @push('scripts')
        <script>
            function previewEditImage(event, id) {
                const preview = document.getElementById('image-preview-' + id);
                const file = event.target.files[0];
                if (file) {
                    preview.src = URL.createObjectURL(file);
                }
            }
        </script>
    @endpush

</x-DashLayout>
