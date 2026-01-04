<x-DashLayout :title="'Profile - ' . auth()->user()->name">
    <div class="d-flex flex-column justify-content-center align-items-center text-center" style="min-height: 75vh;">
        <h1 class="display-3 fw-bold text-warning mb-3">Coming Soon</h1>
        <p class="text-muted fs-5 mb-4">
            Halaman ini sedang dalam tahap rekonstruksi.<br>
            Kami sedang menyiapkan tampilan baru yang lebih modern dan elegan untuk Anda.
        </p>

        <a href="{{ route('dashboard.index') }}" class="btn btn-warning text-dark px-4 py-2 rounded-pill fw-semibold shadow-sm">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Dashboard
        </a>
    </div>
</x-DashLayout>
