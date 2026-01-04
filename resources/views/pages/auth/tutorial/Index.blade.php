<x-DashLayout :title="__('msg.tutorial')">
    <x-atoms.alert />
    <div class="container py-4 tutorial-section">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <x-atoms.header-dashboard title="{{ __('msg.tutorial') }}" />
        </div>

        <!-- Tabs -->
        <ul class="nav nav-pills justify-content-center mb-4" id="tutorialTabs" role="tablist">
            @if (Auth::user()->role == 1)
                <!-- ADMIN ROLE -->
                <li class="nav-item m-1" role="presentation">
                    <button class="nav-link active" id="nav-admin"
                        data-bs-toggle="pill" data-bs-target="#tab-admin" type="button" role="tab">
                        Admin
                    </button>
                </li>
            @endif

            @if (Auth::user()->role == 0)
                <!-- USER ROLE -->
                <li class="nav-item m-1" role="presentation">
                    <button class="nav-link active" id="nav-user"
                        data-bs-toggle="pill" data-bs-target="#tab-user" type="button" role="tab">
                        {{ __('msg.users') }}
                    </button>
                </li>
            @endif

            <!-- SEMUA ROLE -->
            <li class="nav-item m-1" role="presentation">
                <button class="nav-link {{ Auth::user()->role != 1 && Auth::user()->role != 0 ? 'active' : '' }}"
                    id="nav-umum" data-bs-toggle="pill" data-bs-target="#tab-umum" type="button" role="tab">
                    {{ __('msg.general') }}
                </button>
            </li>
        </ul>

        <!-- Content -->
        <div class="tab-content" id="tutorialTabsContent">
            @if (Auth::user()->role == 1)
                <!-- ADMIN -->
                <div class="tab-pane fade show active" id="tab-admin" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="card tutorial-card border-dark border-opacity-25">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-2">📊 Admin Dashboard</h5>
                                    <p class="text-muted small">Tutorial untuk manajemen data, artikel, dan pengguna.</p>
                                    <video class="w-100 rounded" controls>
                                        <source src="{{ asset('videos/tutorial-dashboard.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (Auth::user()->role == 0)
                <!-- USER -->
                <div class="tab-pane fade show active" id="tab-user" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="card tutorial-card border-dark border-opacity-25">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-2">🏁 User Introduction</h5>
                                    <p class="text-muted small">Panduan penggunaan dasar untuk pengguna umum.</p>
                                    <video class="w-100 rounded" controls>
                                        <source src="{{ asset('videos/tutorial-intro.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- UMUM -->
            <div class="tab-pane fade {{ Auth::user()->role != 1 && Auth::user()->role != 0 ? 'show active' : '' }}" id="tab-umum" role="tabpanel">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card tutorial-card border-dark border-opacity-25">
                            <div class="card-body">
                                <h5 class="fw-bold mb-2">☕ General Info</h5>
                                <p class="text-muted small">Panduan umum untuk semua pengunjung.</p>
                                <video class="w-100 rounded" controls>
                                    <source src="{{ asset('videos/tutorial-intro.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-5">
            <p class="text-muted mb-2">{{ __('msg.still_confused') }}</p>
            <a href="https://wa.me/62881026350444?text=hyyy+MinXO" class="btn btn-secondary text-dark fw-bold">
                <i class="fas fa-question-circle me-2"></i> {{ __('msg.ask_assist') }}
            </a>
        </div>
    </div>

    <style>
        .tutorial-section {
            border-radius: 1rem;
        }

        .nav-pills .nav-link {
            background: transparent;
            color: #cfcfcf;
            border: 1px solid #444;
            transition: all .3s ease;
        }

        .nav-pills .nav-link.active {
            background: linear-gradient(90deg, #2369c4, #146fe6);
            color: #fff;
            border-color: #2369c4;
            box-shadow: 0 0 10px #2369c4;
        }

        .tutorial-card {
            border-radius: 1rem;
            transition: transform .3s ease, box-shadow .3s ease;
            background-color: #fdfdfd;
        }

        .tutorial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px #464646;
        }

        video,
        img {
            max-height: 220px;
            object-fit: cover;
        }
    </style>
</x-DashLayout>
