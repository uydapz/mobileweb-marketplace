<x-HomeLayout :title="__('msg.collections')" :banners="$banners">
    <section id="collections" class="py-5 bg-light">
        <div class="container">

            @if($collections->isEmpty())
                <p class="text-center text-muted">{{ __('msg.no_collections_yet') }}</p>
            @else
                <div class="row g-4">
                    @foreach($collections as $collection)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="{{ asset($collection->image) }}" class="card-img-top" alt="{{ $collection->name }}" style="height: 220px; object-fit: cover;">

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="fas fa-tag me-2 text-primary"></i> {{ $collection->name }}
                                    </h5>

                                    <p class="card-text text-muted">{{ Str::limit($collection->description, 80) }}</p>

                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        @if($collection->category)
                                            <span class="badge bg-secondary rounded-pill">
                                                <i class="fas fa-layer-group me-1"></i> {{ $collection->category->name }}
                                            </span>
                                        @endif

                                        {{-- Contoh badge tambahan bebas --}}
                                        <span class="badge bg-info text-dark rounded-pill">
                                            <i class="fas fa-star me-1"></i> {{ __('msg.featured_design') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-HomeLayout>
