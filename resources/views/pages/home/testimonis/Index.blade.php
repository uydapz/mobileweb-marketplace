<x-HomeLayout :title="__('msg.testimoni')" :banners="$banners">
    <section id="testimoni" class="py-5 bg-light">
        <div class="container">

            @if($testimonis->isEmpty())
                <p class="text-center text-muted">{{ __('msg.no_testimonials_yet') }}</p>
            @else
                <div class="row g-4">
                    @foreach($testimonis as $testimoni)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 hover-scale">
                                <div class="card-body d-flex flex-column justify-content-between text-center">

                                    {{-- Quote --}}
                                    <p class="text-muted mb-4 fs-5">
                                        <i class="fas fa-quote-left text-primary me-2"></i>
                                        {{ Str::limit($testimoni->quote, 200) }}
                                        <i class="fas fa-quote-right text-primary ms-2"></i>
                                    </p>

                                    {{-- Avatar --}}
                                    @if($testimoni->user && $testimoni->user->avatar)
                                        <img src="{{ asset('storage/' . $testimoni->user->avatar) }}" 
                                             alt="{{ $testimoni->user->name }}" 
                                             class="rounded-circle mb-2" 
                                             style="width:70px; height:70px; object-fit:cover; margin:auto;">
                                    @endif

                                    {{-- Nama dan role --}}
                                    @if($testimoni->user)
                                        <h5 class="fw-bold mt-2">{{ $testimoni->user->name }}</h5>
                                        <h5 class="fw-bold mt-2">{{ $testimoni->user->position }}</h5>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-4 d-flex justify-content-center">
                    {{ $testimonis->links() }}
                </div>
            @endif
        </div>

        <style>
            .hover-scale {
                transition: transform 0.3s, box-shadow 0.3s;
            }
            .hover-scale:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 25px rgba(0,0,0,0.15);
            }
        </style>
    </section>
</x-HomeLayout>
