<x-HomeLayout title="NDEXO Mart">
    <section id="marts" class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-3 text-brown">NDEXO Mart</h2>
            <p class="text-center text-muted mb-5">
                Temukan koleksi batik eksklusif kami yang menggabungkan tradisi dan modernitas.
            </p>

            <div class="row g-4">
                @forelse($marts as $mart)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card h-100 shadow-sm rounded-4 overflow-hidden hover-up border-0">
                            @php
                                // Handle multiple images (ambil yang pertama)
                                $images = is_array($mart->image)
                                    ? $mart->image
                                    : (is_string($mart->image)
                                        ? json_decode($mart->image, true)
                                        : []);
                                $firstImage = !empty($images)
                                    ? asset('storage/' . $images[0])
                                    : asset('assets/images/no-image.webp');
                            @endphp

                            <a href="{{ route('marts.show', $mart->id) }}" class="text-decoration-none">
                                <img src="{{ $firstImage }}" alt="{{ $mart->product_name }}" class="card-img-top"
                                    style="height:250px;object-fit:cover;">
                            </a>

                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold text-brown mb-1">{{ $mart->product_name }}</h5>
                                <p class="small text-muted mb-2">
                                    {{ $mart->collection->name ?? 'Tanpa Koleksi' }}
                                </p>
                                <p class="text-dark fw-semibold mb-2">
                                    Rp {{ number_format($mart->price, 0, ',', '.') }}
                                </p>

                                <span
                                    class="badge {{ $mart->stock > 0 ? 'bg-success' : 'bg-danger' }} align-self-start">
                                    {{ $mart->stock > 0 ? 'Tersedia' : 'Habis' }}
                                </span>

                                <a href="{{ route('marts.show', $mart->id) }}"
                                    class="btn btn-brown mt-auto w-100 fw-bold mt-3">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-box-open fa-2x mb-2"></i><br>
                        Belum ada produk tersedia.
                    </div>
                @endforelse
            </div>

            <div class="mt-5">
                {{ $marts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>

    <style>
        .text-brown {
            color: #8B4513;
        }

        .btn-brown {
            background-color: #8B4513;
            color: #fff;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-brown:hover {
            background-color: #a05c2c;
        }

        .hover-up {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-up:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(139, 69, 19, 0.2);
        }

        /* Responsif tambahan */
        @media (max-width: 576px) {
            .card-img-top {
                height: 200px !important;
            }

            .card-body h5 {
                font-size: 1rem;
            }

            .card-body p {
                font-size: 0.875rem;
            }
        }
    </style>
</x-HomeLayout>
