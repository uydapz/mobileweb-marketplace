<x-HomeLayout :title="__('msg.story')" :banners="$banners">
    <section id="stories" class="bg-white py-5 px-5">
        <div class="container">
            <form method="GET" action="{{ route('stories.index') }}" class="mb-4 d-flex justify-content-center"
                role="search">
                <div class="row">
                    <div class="col-9">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                            placeholder="Search stories..." aria-label="Search stories">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-dark rounded-pill px-3" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="row g-4">
                @foreach ($stories as $story)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm rounded-4"
                            onclick="window.location.href='{{ route('stories.show', $story->id) }}'">
                            @if ($story->image)
                                <img src="{{ asset('storage/' . $story->image) }}" class="card-img-top rounded-top-4"
                                    style="height:200px; object-fit:cover;" alt="{{ $story->title }}">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold">{{ Str::limit($story->title, 50) }}</h5>
                                <p class="text-secondary mb-3">{{ Str::limit(strip_tags($story->content), 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            {{ $stories->links() }}
        </div>
    </section>

    <style>
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
    </style>
</x-HomeLayout>
