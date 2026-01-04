<x-HomeLayout :title="__('msg.event')" :banners="$banners">
    <section id="events" class="py-5 bg-light">
        <div class="container">

            @if($events->isEmpty())
                <p class="text-center text-muted">{{ __('msg.no_upcoming_events') }}</p>
            @else
                <div class="row g-4">
                    @foreach($events as $event)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-scale">
                                {{-- Optional: banner image --}}
                                @if($event->banner_image)
                                    <img src="{{ asset('storage/' . $event->banner_image) }}" class="card-img-top" style="height:180px; object-fit:cover;" alt="{{ $event->title }}">
                                @endif

                                <div class="card-body d-flex flex-column">
                                    {{-- Tanggal menonjol --}}
                                    <div class="mb-2">
                                        <span class="badge bg-primary text-white">
                                            <i class="fas fa-calendar-alt me-1"></i> 
                                            {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d M') }}
                                            @if($event->end_date)
                                                - {{ \Carbon\Carbon::parse($event->end_date)->translatedFormat('d M') }}
                                            @endif
                                        </span>
                                    </div>

                                    <h5 class="fw-bold">{{ $event->title }}</h5>
                                    <p class="text-muted small mb-3">{{ Str::limit($event->description, 100) }}</p>

                                    @if($event->location)
                                        <p class="mb-3 text-secondary">
                                            <i class="fas fa-map-marker-alt me-1"></i> {{ $event->location }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-4 d-flex justify-content-center">
                    {{ $events->links() }}
                </div>
            @endif
        </div>

        <style>
            /* Hover efek untuk card */
            .hover-scale {
                transition: transform 0.3s, box-shadow 0.3s;
            }
            .hover-scale:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.12);
            }
        </style>
    </section>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</x-HomeLayout>
