<x-HomeLayout :title="__('msg.lookbook')" :banners="$banners">
    <section id="lookbooks" class="py-5 bg-light">
        <div class="container">

            @if ($lookbooks->isEmpty())
                <p class="text-center text-muted">{{ __('msg.no_lookbooks_yet') }}</p>
            @else
                <div class="row g-4">
                    @foreach ($lookbooks as $lookbook)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                                <img src="{{ asset('storage/' . ($lookbook->cover_image ?? 'images/default.webp')) }}"
                                    class="card-img-top" alt="{{ $lookbook->title }}"
                                    style="height:220px; object-fit:cover;">

                                <div class="card-body d-flex flex-column">
                                    <h5 class="fw-bold">
                                        <i class="fas fa-tag text-primary me-1"></i> {{ $lookbook->title }}
                                    </h5>
                                    <p class="text-muted small mb-1">{{ Str::limit($lookbook->description, 80) }}</p>
                                    <small class="text-secondary mb-2">
                                        {{ \Carbon\Carbon::createFromDate($lookbook->period_year, $lookbook->period_month)->translatedFormat('F Y') }}
                                    </small>

                                    {{-- Badge ringkas --}}
                                    @if ($lookbook->collections->isNotEmpty())
                                        <span class="badge bg-secondary" data-bs-toggle="modal"
                                            data-bs-target="#collectionsModal{{ $lookbook->id }}"
                                            style="cursor:pointer;">
                                            <i class="fas fa-hand-point-up me-1"></i>
                                            {{ $lookbook->collections->count() }}
                                        </span>
                                        {{-- Modal --}}
                                        <div class="modal fade" id="collectionsModal{{ $lookbook->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ $lookbook->title }} Collections</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach ($lookbook->collections as $collection)
                                                            <span class="badge bg-secondary mb-1">
                                                                <i class="fas fa-layer-group me-1"></i>
                                                                {{ $collection->name }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-4 d-flex justify-content-center">
                    {{ $lookbooks->links() }}
                </div>
            @endif
        </div>
    </section>
</x-HomeLayout>
