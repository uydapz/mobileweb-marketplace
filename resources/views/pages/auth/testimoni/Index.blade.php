<x-DashLayout :title="__('msg.testimoni')">
    <x-atoms.alert />
    <div class="dashboard-collection container py-5">

        <!-- Header -->
        <x-atoms.header-dashboard title="{{ __('msg.testimoni') }}" />

        @if (auth()->user()->role == 1)
            <!-- List Testimoni -->
            <div class="row mt-4 g-4">
                @forelse ($testimonis as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden position-relative h-100 hover-zoom"
                            style="transition: all 0.3s ease;">
                            <!-- Decorative Accent -->
                            <div class="position-absolute top-0 start-0 w-100 h-1"
                                style="background: linear-gradient(90deg, #ffae00, #ff6600);"></div>

                            <div class="card-body d-flex flex-column align-items-center text-center p-4">
                                <!-- Gambar -->
                                <div class="rounded-circle shadow-sm mb-3 overflow-hidden border border-warning"
                                    style="width: 75px; height: 75px;">
                                    @if ($item->user->avatar)
                                        <img src="
                                        {{ Str::startsWith($item->user->avatar, 'http')
                                            ? $item->user->avatar
                                            : asset('storage/' . $item->user->avatar ?? 'adsets/img/avatars/default.png') }}"
                                            alt="{{ $item->user->name }}"
                                            class="img-fluid w-100 h-100 object-fit-cover rounded-circle" />
                                    @else
                                        <div
                                            class="bg-secondary w-100 h-100 d-flex align-items-center justify-content-center text-white">
                                            <i class="fas fa-user fa-lg"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Nama -->
                                <h6 class="fw-bold text-dark mb-1 text-uppercase">{{ $item->user->name }}</h6>

                                <!-- Quote -->
                                <p class="fst-italic text-muted small mb-3 px-2">
                                    " {{ $item->quote }} "
                                </p>

                                <!-- Status -->
                                <span class="badge px-3 py-2 bg-secondary">
                                    {{ ucfirst($item->user->position) }}
                                </span>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="card-footer bg-transparent border-0 py-3">
                                <div
                                    class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3">

                                    <!-- Tombol Email -->
                                    <x-atoms.button chat="true" color="primary" icon="fa fa-paper-plane"
                                        link="mailto:{{ $item->user->email }}" />

                                    <!-- Toggle Switch -->
                                    <form action="{{ route('testimoni.toggle', $item->id) }}" method="POST"
                                        class="d-inline mb-0">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-check form-switch d-flex align-items-center">
                                            <input class="form-check-input me-2" type="checkbox"
                                                id="toggle-{{ $item->id }}" {{ $item->show ? 'checked' : '' }}
                                                onchange="setTimeout(() => this.form.submit(), 200)">
                                            <label
                                                class="form-check-label small {{ $item->show ? 'text-success fw-semibold' : 'text-muted' }}"
                                                for="toggle-{{ $item->id }}">
                                                {{ $item->show ? 'Ditampilkan' : 'Disembunyikan' }}
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-box-open fa-2x mb-2 text-secondary"></i><br>
                    {{ __('msg.no_testimoni') }}
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-5 text-center">
                {{ $testimonis->links() }}
            </div>
        @endif

        @if (auth()->user()->role == 0)
        <div class="card shadow-sm border-0 rounded-4 mt-4">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('testimoni.store') }}">
                    @csrf

                    <div class="mb-4">
                        <x-atoms.textarea id="content-{{ auth()->user()->id }}" label="{{ __('msg.testimoni_label') }}" name="quote">
                           {{    auth()->user()->testimoni->quote  ?? ''  }}
                        </x-atoms.textarea>

                    </div>

                    <div class="text-end">
                        <x-atoms.button type="submit" color="primary">
                            <i class="fas fa-save me-1"></i> {{ __('msg.save') }}
                        </x-atoms.button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>

    <style>
        /* Efek hover biar lebih "gacor" */
        .hover-zoom:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        /* Animasi halus saat load */
        .card {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</x-DashLayout>
