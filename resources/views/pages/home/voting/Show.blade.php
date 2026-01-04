<x-HomeLayout :title="$vote->title">
    <x-atoms.alert />
    <section class="py-5">
        <div class="container">
            <h2 class="text-3xl fw-bold text-center mb-4">{{ $vote->title }}</h2>
            <p class="text-center text-muted mb-5">{{ $vote->description }}</p>

            @if (session('success'))
                <div class="alert text-success text-center">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert text-danger text-center">{{ session('error') }}</div>
            @endif

            <div class="row g-4 justify-content-center">
                @foreach ($vote->collections as $collection)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card h-100 shadow-sm rounded-4 overflow-hidden text-center">
                            <img src="{{ asset($collection->image) }}" class="card-img-top"
                                alt="{{ $collection->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold">{{ $collection->name }}</h5>
                                <p class="text-muted small mb-2">{{ Str::limit($collection->description, 80) }}</p>

                                <form action="{{ route('voting.user', $vote->id) }}" method="POST" class="mt-auto">
                                    @csrf
                                    <input type="hidden" name="vote_collection_id" value="{{ $collection->id }}">
                                    <button type="submit" class="btn btn-primary w-100 fw-bold"
                                        @if ($userVoted) disabled @endif>
                                        @if ($userVoted)
                                            Sudah Vote
                                        @else
                                            Vote Sekarang
                                        @endif
                                    </button>
                                </form>

                                <div class="mt-2">
                                    <small class="text-secondary">{{ $collection->pivot->vote_count }} suara</small>
                                    <div class="progress mt-1" style="height:6px;">
                                        @php
                                            $total = $vote->collections->sum(fn($c) => $c->pivot->vote_count);
                                            $percent = $total ? ($collection->pivot->vote_count / $total) * 100 : 0;
                                        @endphp
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol kembali -->
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('voting.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left me-1"></i> Back
                </a>
            </div>

            @if ($vote->end_at)
                <p class="text-center text-muted mt-4">
                    Voting berakhir: {{ \Carbon\Carbon::parse($vote->end_at)->translatedFormat('d F Y H:i') }}
                </p>
            @endif
        </div>
    </section>
    <style>
        :root {
            --ndexo-dark: #3c2508;
            --ndexo-gold: #a87a2f;
            --ndexo-bg: #f8f4ef;
            --ndexo-text: #1f1c19;
        }

        .btn-back {
            display: inline-block;
            padding: 0.7rem 2rem;
            background: var(--ndexo-dark);
            border-radius: 12px;
            color: var(--ndexo-bg);
            font-weight: 600;
            letter-spacing: 0.3px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: linear-gradient(90deg, var(--ndexo-gold), var(--ndexo-dark));
            color: #fff;
        }
    </style>
</x-HomeLayout>
