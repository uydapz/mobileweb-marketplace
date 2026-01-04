<x-DashLayout :title="__('msg.feedback')">
    <x-atoms.alert />
    <div class="dashboard-collection container py-5">
        <x-atoms.header-dashboard title="{{ __('msg.feedback') }}" />

        @if (Auth::user()->role == 0)
            <!-- === USER BIASA (ROLE 0) === -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                        <h4 class="fw-bold mb-3 text-primary">Submit Feedback / Kirim Kritik & Saran</h4>
                        <form action="{{ route('feedback.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Name / Nama</label>
                                <input type="text" class="form-control rounded-3" id="name" name="name"
                                    value="{{ Auth::user()->name ?? old('name') }}" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email (optional)</label>
                                <input type="email" class="form-control rounded-3" id="email" name="email"
                                    value="{{ Auth::user()->email ?? old('email') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label fw-semibold">Message / Pesan</label>
                                <textarea class="form-control rounded-3" id="message" name="message" rows="4" required
                                    placeholder="Tulis kritik, saran, atau pengalaman kamu di sini..."></textarea>
                            </div>
                            <button type="submit"
                                class="btn w-100 py-2 fw-semibold text-white rounded-3"
                                style="background: linear-gradient(135deg, #4B2E05, #9C6F2F); border: none;">
                                <i class="bi bi-send me-1"></i> Send / Kirim
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->role == 1)
            <!-- === ADMIN (ROLE 1) === -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                        <h4 class="fw-bold mb-3 text-primary">Recent Feedback / Umpan Balik Terbaru</h4>
                        <div class="feedback-list" style="max-height: 600px; overflow-y: auto;">
                            @forelse ($feedback as $item)
                                <div class="border-bottom pb-3 mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px;">
                                            {{ strtoupper(substr($item->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <strong>{{ $item->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $item->email }}</small>
                                        </div>
                                    </div>
                                    <p class="mb-1 text-secondary">{{ $item->message }}</p>
                                    <small class="text-muted">
                                        <i class="bi bi-clock me-1"></i>{{ $item->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            @empty
                                <p class="text-muted">No feedback yet / Belum ada umpan balik</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-DashLayout>
