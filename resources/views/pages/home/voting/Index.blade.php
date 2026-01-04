<x-HomeLayout :title="__('msg.vote')">
    <section class="py-5">
        <div class="container">

            @if ($votes->isEmpty())
                <div class="text-center text-muted py-5">
                    <i class="fas fa-box-open fa-2x mb-2"></i><br>
                    {{ __('msg.no_vote') }}
                </div>
            @else
                <div class="row g-4">
                    @foreach ($votes as $vote)
                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('voting.show', $vote->id) }}" class="text-decoration-none">
                                <div class="card h-100 shadow-sm rounded-4 overflow-hidden text-center">
                                    {{-- Koleksi VS --}}
                                    @if ($vote->collections->count())
                                        <div class="d-flex justify-content-center align-items-center gap-2 p-2">
                                            @foreach ($vote->collections as $collection)
                                                <img src="{{ asset('storage/' . $collection->image) }}" class="rounded"
                                                    style="width:50px;height:50px;object-fit:cover;">
                                                @if (!$loop->last)
                                                    <span class="fw-bold text-brown">VS</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="card-body d-flex flex-column">
                                        <h5 class="fw-bold text-brown">{{ $vote->title }}</h5>
                                        <p class="text-muted small mb-3">{{ Str::limit($vote->description, 80) }}</p>

                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <span class="{{ $vote->is_active ? 'text-success' : 'text-danger' }}">
                                                {{ $vote->is_active ? __('msg.active') : __('msg.inactive') }}
                                            </span>
                                            <small class="text-muted">
                                                {{ \Carbon\Carbon::parse($vote->start_at)->format('d M') }}
                                                - {{ \Carbon\Carbon::parse($vote->end_at)->format('d M') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-4 d-flex justify-content-center">
                    {{ $votes->links() }}
                </div>
            @endif
        </div>
    </section>

    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(160, 82, 45, 0.2);
        }

        .text-brown {
            color: #8B5E3C;
        }
    </style>
</x-HomeLayout>
