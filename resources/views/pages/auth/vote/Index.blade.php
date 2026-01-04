<x-DashLayout :title="__('msg.vote')">
    <x-atoms.alert />

    <div class="dashboard-collection container py-4">

        <!-- Header -->
        <x-atoms.header-dashboard title="{{ __('msg.vote') }}" :route="route('vote.create')" btnLabel="{{ __('msg.add_vote') }}"
            btnColor="bg-warning text-dark" />

        <!-- Voting Event Cards -->
        <div class="row g-3 mt-3">
            @forelse($votes as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="vote-event-card rounded-4 shadow-sm p-3 position-relative overflow-hidden">
                        @if ($item->is_active)
                            <form action="{{ route('vote.close', $item->id) }}" method="POST"
                                class="confirm-close position-absolute top-0 end-0" style="z-index: 10;">
                                @csrf
                                <button type="submit" class="close-tag border-0 rounded-bottom-start px-3 py-1">
                                    <i class="fas fa-lock me-1"></i> Close vote
                                </button>
                            </form>
                        @endif

                        @if ($item->collections && $item->collections->count() > 0)
                            <div
                                class="vote-collections d-flex justify-content-center align-items-center gap-3 mb-3 mt-3 position-relative">
                                @foreach ($item->collections as $collection)
                                    <div class="collection-wrapper position-relative">
                                        <img src="{{ asset('storage/' . $collection->image) }}"
                                            alt="{{ $collection->name }}" class="collection-thumb rounded"
                                            title="{{ $collection->name }}">
                                    </div>
                                    @if (!$loop->last)
                                        <span class="vs-text fw-bold text-uppercase text-brown">VS</span>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                        <!-- Header -->
                        <div class="vote-header mb-2">
                            <h5 class="fw-bold text-brown">{{ $item->title }}</h5>
                            <p class="text-muted small mb-0">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ \Carbon\Carbon::parse($item->start_at)->format('d M Y') }}
                                &ndash;
                                {{ \Carbon\Carbon::parse($item->end_at)->format('d M Y') }}
                            </p>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-dark small mb-3">
                            {!! Str::limit(strip_tags($item->description), 100) !!}
                        </p>

                        <!-- Footer -->
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="{{ $item->is_active ? 'text-success' : 'text-danger' }}">
                                {{ $item->is_active ? __('msg.active') : __('msg.inactive') }}
                            </span>

                            <div class="d-flex gap-2">
                                <x-atoms.button target="editVoteModal-{{ $item->id }}" icon="fas fa-edit"
                                    label="{{ __('msg.edit') }}" />
                                <x-atoms.button type="submit" color="danger" icon="fas fa-trash" :confirmDelete="true"
                                    :form="route('vote.destroy', $item->id)" method="DELETE" />
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-box-open fa-2x mb-2 text-secondary"></i><br>
                    {{ __('msg.no_vote') }}
                </div>
            @endforelse
            @foreach ($votes as $vote)
                <x-atoms.modal id="editVoteModal-{{ $vote->id }}"
                    title="{{ __('msg.edit') }} {{ __('msg.vote') }}: {{ $vote->title }}">
                    <form action="{{ route('vote.update', $vote->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Judul -->
                        <x-atoms.text-input label="{{ __('msg.title') }}" name="title" :value="$vote->title" required />

                        <!-- Deskripsi -->
                        <x-atoms.textarea label="{{ __('msg.description') }}" id="content-{{ $vote->id }}" name="description"
                            editor="true">{{ $vote->description }}</x-atoms.textarea>

                        <!-- Waktu Mulai -->
                        <x-atoms.text-input type="datetime-local" label="{{ __('msg.start_at') }}" name="start_at"
                            :value="$vote->start_at
                                ? \Illuminate\Support\Carbon::parse($vote->start_at)->format('Y-m-d\TH:i')
                                : ''" required />

                        <!-- Waktu Selesai -->
                        <x-atoms.text-input type="datetime-local" label="{{ __('msg.end_at') }}" name="end_at"
                            :value="$vote->end_at
                                ? \Illuminate\Support\Carbon::parse($vote->end_at)->format('Y-m-d\TH:i')
                                : ''" required />
                        <!-- Koleksi yang diikutkan -->
                        <label class="form-label fw-semibold">{{ __('msg.choose_collections') }}</label>
                        <select id="collections-select-{{ $vote->id }}" name="collections[]" multiple
                            class="form-select">
                            @foreach ($collections as $collection)
                                <option value="{{ $collection->id }}"
                                    {{ in_array($collection->id, $vote->collections->pluck('id')->toArray() ?? []) ? 'selected' : '' }}>
                                    {{ $collection->name }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Preview gambar -->
                        <div id="collections-preview-{{ $vote->id }}" class="d-flex flex-wrap gap-2 mt-3"></div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const select{{ $vote->id }} = document.getElementById('collections-select-{{ $vote->id }}');
                                const previewContainer{{ $vote->id }} = document.getElementById(
                                    'collections-preview-{{ $vote->id }}');

                                const collectionImages{{ $vote->id }} = {
                                    @foreach ($collections as $collection)
                                        "{{ $collection->id }}": "{{ asset('storage/' . $collection->image) }}",
                                    @endforeach
                                };

                                function updatePreview{{ $vote->id }}() {
                                    previewContainer{{ $vote->id }}.innerHTML = '';
                                    const selectedOptions = Array.from(select{{ $vote->id }}.selectedOptions).map(opt => opt
                                        .value);

                                    selectedOptions.forEach(id => {
                                        if (collectionImages{{ $vote->id }}[id]) {
                                            const img = document.createElement('img');
                                            img.src = collectionImages{{ $vote->id }}[id];
                                            img.alt = "Preview";
                                            img.style.width = '100px';
                                            img.style.height = '100px';
                                            img.style.objectFit = 'cover';
                                            img.classList.add('rounded');
                                            previewContainer{{ $vote->id }}.appendChild(img);
                                        }
                                    });
                                }

                                select{{ $vote->id }}.addEventListener('change', updatePreview{{ $vote->id }});
                                updatePreview{{ $vote->id }}();
                            });
                        </script>

                        <!-- Status aktif -->
                        <div class="form-check mt-3">
                            <input type="checkbox" name="is_active" id="is_active_{{ $vote->id }}" value="1"
                                class="form-check-input" {{ $vote->is_active ? 'checked' : '' }}>
                            <label for="is_active_{{ $vote->id }}" class="form-check-label">
                                {{ __('msg.active_vote') }}
                            </label>
                        </div>

                        <div class="modal-footer p-0 mt-3">
                            <x-atoms.button type="button" color="secondary" dismiss="true">
                                {{ __('msg.close') }}
                            </x-atoms.button>
                            <x-atoms.button type="submit" color="primary">
                                {{ __('msg.save') }}
                            </x-atoms.button>
                        </div>
                    </form>
                </x-atoms.modal>
            @endforeach
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.confirm-close').forEach(function(form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'Close this voting event?',
                            text: "Once closed, users will no longer be able to vote.",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#a67c52',
                            cancelButtonColor: '#8b5e3c',
                            confirmButtonText: 'Yes, Close',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) form.submit();
                        });
                    });
                });
            });
        </script>
    @endpush
    <style>
        .close-tag {
            background-color: #8B4513;
            /* coklat tua elegan */
            color: #fff;
            font-size: 0.8rem;
            border-top-right-radius: 0;
            border-bottom-left-radius: 10px;
            transition: all 0.3s ease;
        }

        .close-tag:hover {
            background-color: #a85d32;
        }

        .vote-event-card {
            position: relative;
            background-color: #f9f4ef;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .vote-event-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(160, 82, 45, 0.2);
        }

        .vote-event-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #f9f4ef;
            /* soft putih krem */
        }

        .vote-event-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(160, 82, 45, 0.2);
            /* soft coklat shadow */
        }

        /* Thumbnail koleksi */
        .vote-collections img.collection-thumb {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e0dcd3;
        }

        /* Header title warna coklat */
        .text-brown {
            color: #8B5E3C;
        }

        /* Badge soft brown */
        .bg-brown-soft {
            background-color: #D2B48C;
        }

        @media (max-width: 768px) {
            .vote-event-card {
                padding: 1rem;
            }

            .vote-collections img.collection-thumb {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</x-DashLayout>
