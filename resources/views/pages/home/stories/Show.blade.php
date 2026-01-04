<x-HomeLayout :title="$story->title" :banners="$banners">
    <section id="stories" class="py-5 py-lg-11 py-xl-12">
        <div class="container">
            <article class="story-wrapper bg-white p-4 rounded-4 shadow-sm">
                <h3 class="fw-bold mb-3">{{ $story->title }}</h3>
                <div class="story-content">
                    {!! $story->content !!}
                </div>

                <a href="{{ route('stories.index') }}" class="btn btn-dark mt-4 rounded-pill">
                    Kembali ke Cerita
                </a>
            </article>
        </div>
    </section>

    <style>
        .story-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }
    </style>
</x-HomeLayout>
