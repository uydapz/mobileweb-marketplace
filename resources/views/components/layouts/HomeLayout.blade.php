@props([
    'title' => null,
    'meta_description' => null,
    'meta_keywords' => null,
    'meta_image' => null,
    'banners' => null,
    'article' => null,
])

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? '' }} | {{ __('msg.ndexo') }}</title>
    <meta name="description"
        content="{{ $meta_description ?? 'Temukan koleksi batik modern eksklusif dari NDEXO. Perpaduan desain klasik dan modern untuk gaya kontemporer.' }}">
    <meta name="keywords"
        content="{{ $meta_keywords ?? 'batik modern, ndexo, batik eksklusif, desain batik kontemporer, fashion batik' }}">
    <meta name="author" content="NDEXO">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logos/favicon.webp') }}" />
    <link rel="shortcut icon" type="image/webp" href="{{ asset('assets/images/logos/favicon.webp') }}" />

    <!-- Open Graph / Social Media -->
    <meta property="og:title" content="{{ $title ?? '' }} | {{ __('msg.ndexo') }}">
    <meta property="og:description"
        content="{{ $meta_description ?? 'Temukan koleksi batik modern eksklusif dari NDEXO.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $meta_image ?? asset('assets/images/logos/favicon.webp') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? '' }} | {{ __('msg.ndexo') }}">
    <meta name="twitter:description"
        content="{{ $meta_description ?? 'Temukan koleksi batik modern eksklusif dari NDEXO.' }}">
    <meta name="twitter:image" content="{{ asset('assets/images/logos/favicon.webp') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/aos-master/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>

    <!-- Header -->
    <x-Header :banners="$banners" :article="$article" :title="$title" />

    <!--  Page Wrapper -->
    <div class="page-wrapper overflow-hidden">
        {{ $slot }}
    </div>

    <x-Bottom />
    <x-Footer />
    @if (request()->routeIs('home'))
        <x-Loader />
    @endif

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/carousel.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/libs/aos-master/dist/aos.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cek apakah alert sudah pernah ditampilkan
            if (!localStorage.getItem('minxo_apology_shown')) {

                Swal.fire({
                    title: "🙏 Maaf dari MinXO",
                    html: `
                <p style="font-size: 16px; color: #4b2e05; font-weight: 500; line-height:1.6;">
                    Web kami masih jauh dari kata sempurna dan masih memerlukan banyak perbaikan.<br>
                    Halaman <strong>Saran & Kritik</strong> sudah tersedia di dashboard <strong>XOlovers</strong> 💬
                </p>
            `,
                    width: 480,
                    padding: "2em",
                    color: "#4b2e05",
                    background: "#fff url('{{ asset('assets/images/bg-alerta.webp') }}') center/cover no-repeat",
                    backdrop: `
                rgba(0,0,0,0.55)
                url("{{ asset('assets/images/logos/favicon.webp') }}")
                center top
                no-repeat
            `,
                    confirmButtonText: "Okey Min",
                    confirmButtonColor: "#8B4513",
                    customClass: {
                        popup: 'rounded-4 shadow-lg',
                        title: 'fw-bold',
                    }
                }).then(() => {
                    // Simpan status bahwa alert sudah muncul
                    localStorage.setItem('minxo_apology_shown', 'true');
                });
            }
        });
    </script>
</body>

</html>
