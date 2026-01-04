<x-HomeLayout :title="$mart->product_name">
    <section id="marts" class="py-5">
        <div class="container">
            <div class="row g-4 align-items-start">
                <!-- Gambar Utama + Thumbnail -->
                <div class="col-12 col-md-6">
                    @php
                        $images = is_array($mart->image)
                            ? $mart->image
                            : (is_string($mart->image)
                                ? json_decode($mart->image, true)
                                : []);
                        $sizes = $mart->sizes ?? collect();
                    @endphp

                    <!-- Gambar utama -->
                    <div class="main-image mb-3">
                        <img id="mainImage"
                            src="{{ asset('storage/' . ($images[0] ?? 'assets/images/no-image.webp')) }}"
                            alt="{{ $mart->product_name }}"
                            class="w-100 rounded-4 shadow-sm"
                            style="max-height:400px; object-fit:cover;">
                    </div>

                    <!-- Thumbnail gallery -->
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        @foreach ($images as $img)
                            <img src="{{ asset('storage/' . $img) }}"
                                class="thumb border rounded"
                                style="width:75px; height:75px; object-fit:cover; cursor:pointer;"
                                onclick="changeMainImage('{{ asset('storage/' . $img) }}')">
                        @endforeach
                    </div>
                </div>

                <!-- Detail Produk -->
                <div class="col-12 col-md-6">
                    <h2 class="fw-bold text-brown mb-1">{{ $mart->product_name }}</h2>
                    <p class="text-muted mb-2">{{ $mart->collection->name ?? 'Tanpa Koleksi' }}</p>
                    <h4 class="fw-semibold mb-3 text-dark">
                        Rp {{ number_format($mart->price, 0, ',', '.') }}
                    </h4>

                    <!-- Ukuran dan Stok -->
                    @if ($sizes->count())
                        <p class="fw-semibold mb-1 text-brown">Tersedia Ukuran:</p>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            @foreach ($sizes as $sz)
                                <div class="border rounded-pill px-3 py-1 small bg-light">
                                    <strong>{{ strtoupper($sz->size) }}</strong> — {{ $sz->stock }} stok
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Deskripsi -->
                    <p class="mb-4 text-muted">{{ $mart->description }}</p>

                    <!-- Tombol Beli -->
                    @if ($mart->is_available != 0)
                        <a href="https://wa.me/6281234567890?text=Halo%20NDEXO,%20saya%20ingin%20membeli%20produk%20{{ urlencode($mart->product_name) }}"
                            class="btn btn-brown px-4 py-2 fw-bold w-100 w-md-auto text-center">
                            Beli via WhatsApp
                        </a>
                    @else
                        <button class="btn btn-secondary px-4 py-2 fw-bold w-100 w-md-auto" disabled>
                            Stok Habis
                        </button>
                    @endif
                </div>
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

        .thumb {
            transition: border 0.2s ease;
        }

        .thumb:hover {
            border: 2px solid #8B4513;
        }

        @media (max-width: 768px) {
            .main-image img {
                max-height: 300px;
            }
            .thumb {
                width: 65px;
                height: 65px;
            }
            .btn-brown, .btn-secondary {
                font-size: 0.9rem;
            }
        }
    </style>

    <script>
        function changeMainImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>
</x-HomeLayout>
