<x-HomeLayout :title="__('msg.article')" :banners="$banners">

<section id="blog" class="article-section bg-white py-5 px-5">

    <!-- Search -->
    <form method="GET" action="{{ route('blog.index') }}" class="mb-4 d-flex justify-content-center" role="search">
        <div class="row">
            <div class="col-9">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                    placeholder="Search articles..." aria-label="Search articles">
            </div>
            <div class="col-3">

                <button class="btn btn-dark rounded-pill px-3" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Article Cards -->
    <div class="row g-4">
        @forelse ($articles as $article)
            <div class="col-md-4">
                <div class="card article-card border-0 h-100 shadow-sm rounded-4" onclick="window.location.href='{{ route('blog.show', $article->slug) }}'">
                    <div class="article-image">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold">{{ Str::limit($article->title, 20) }}</h5>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-person"></i> {{ $article->user->name ?? 'NDEXO' }} •
                            <i class="bi bi-calendar"></i> {{ $article->created_at->format('M d, Y') }}
                        </p>
                        <p class="text-secondary small mb-3">
                            {{ Str::limit(strip_tags($article->content), 120) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5">
                <i class="bi bi-emoji-frown fs-3 d-block mb-2"></i>
                No articles found.
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</section>

<style>
    /* Article List Styling */
    .article-card {
        transition: all 0.3s ease;
    }

    .article-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .article-image img {
        height: 220px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .article-card:hover .article-image img {
        transform: scale(1.05);
    }

    .pagination .page-link {
        border-radius: 50%;
        color: #333;
    }

    .pagination .active .page-link {
        background: #4B2E05;
        color: #fff;
        border: none;
    }
</style>
</x-HomeLayout>
