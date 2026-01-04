<x-DashLayout :title="__('msg.article')">
    <x-atoms.alert />

    <div class="dashboard-collection container py-4">
        <!-- Header -->
        <x-atoms.header-dashboard title="{{ __('msg.article') }}" :route="route('article.create')" btnLabel="{{ __('msg.add_article') }}"
            btnColor="bg-warning text-dark" />

        <!-- Articles Grid -->
        <div class="row g-3 mt-3">
            @forelse($articles as $article)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm rounded-4 overflow-hidden">
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top"
                                alt="{{ $article->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-content">
                                {!! Str::limit(strip_tags($article->content), 100) !!}
                            </p>

                            <small class="text-muted">
                                {{ $article->user->name ?? 'Unknown' }} |
                                {{ $article->created_at->format('d M Y') }}
                            </small>
                        </div>
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <x-atoms.button target="editArticleModal-{{ $article->id }}" icon="fas fa-edit"
                                label="{{ __('msg.edit') }}" />
                            <x-atoms.button type="submit" color="danger" icon="fas fa-trash" :confirmDelete="true"
                                :form="route('article.destroy', $article->id)" method="DELETE" />
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-newspaper fa-2x mb-2 text-secondary"></i><br>
                    {{ __('msg.no_article') }}
                </div>
                @endforelse
            </div>
            <div class="mt-4 text-center">
                {{ $articles->links() }}
            </div>

        <!-- Modal Edit per Article -->
        @foreach ($articles as $article)
            <x-atoms.modal id="editArticleModal-{{ $article->id }}"
                title="{{ __('msg.edit') }} {{ __('msg.article') }}">
                <form class="edit-article-form" action="{{ route('article.update', $article->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <x-atoms.text-input label="{{ __('msg.title') }}" name="title" class="title-input"
                        :value="$article->title ?? old('title')" required />
                    <x-atoms.text-input label="{{ __('msg.slug') }}" name="slug" :value="$article->slug ?? old('slug')" required
                        readonly />
                    <x-atoms.textarea label="{{ __('msg.content') }}" name="content" id="content-{{ $article->id }}"
                        editor="true">{{ $article->content ?? old('content') }}</x-atoms.textarea>
                    <x-atoms.image-input label="{{ __('msg.image') }}" name="image" :value="$article->image ? asset('storage/' . $article->image) : null"
                        :uniq="$article->id" />

                    <div class="modal-footer p-0 mt-3">
                        <x-atoms.button type="button" color="secondary"
                            dismiss="true">{{ __('msg.close') }}</x-atoms.button>
                        <x-atoms.button type="submit" color="primary">{{ __('msg.save') }}</x-atoms.button>
                    </div>
                </form>
            </x-atoms.modal>
        @endforeach
    </div>

    <style>
        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .card-footer x-atoms-button {
            flex: 1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-generate slug dari title
            document.querySelectorAll('.edit-article-form').forEach(form => {
                const titleInput = form.querySelector('.title-input');
                const slugInput = form.querySelector('input[name="slug"]');

                titleInput?.addEventListener('input', function() {
                    let slug = this.value.toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/\s+/g, '-');
                    slugInput.value = slug;
                });
            });
        });
    </script>
</x-DashLayout>
