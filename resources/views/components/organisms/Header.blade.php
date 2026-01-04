@props([
    'title' => null,
    'article' => null,
    'banners' => null,
])
<header class="header border-4 border-primary border-top position-fixed start-0 top-0 w-100">
    <div class="container">
        <div class="header-wrapper d-flex align-items-center justify-content-between">
            <!-- Logo for desktop -->
            <div class="logo d-none d-md-block">
                <a href="/" class="logo-white">
                    <x-atoms.logo-light />
                </a>
                <a href="/" class="logo-dark">
                    <x-atoms.logo-dark />
            </div>

            <!-- Mobile logo only, centered -->
            <div class="logo-mobile d-md-none w-100 d-flex justify-content-center">
                <a href="/" class="logo-white">
                    <x-atoms.logo-light />

                </a>
                <a href="/" class="logo-dark d-none">
                    <x-atoms.logo-dark />
                </a>
            </div>

            <!-- Desktop menu (hidden on mobile) -->
            <div class="d-none d-md-flex align-items-center gap-4">
                <button class="btn btn-mart d-flex align-items-center gap-2" type="button"
                    onclick="window.location.href='{{ route('voting.index') }}'" aria-label="Mart">
                    <i class="fa-solid fa-check-to-slot text-dark"></i>
                </button>
                <div class="btn-group">
                    <button
                        class="btn btn-secondary toggle-menu round-45 p-2 d-flex align-items-center justify-content-center bg-white rounded-circle"
                        type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                        <iconify-icon icon="solar:hamburger-menu-line-duotone"
                            class="menu-icon fs-8 text-dark"></iconify-icon>
                    </button>
                    <!-- Dropdown menu content -->
                    <ul class="dropdown-menu dropdown-menu-end p-5 custom-menu">
                        <div class="hstack justify-content-between p-3">
                            <p class="mb-0 fs-5 text-dark">Menu</p>
                            <button type="button" class="btn-close opacity-75" aria-label="Close"></button>
                        </div>
                        <div class="row g-3">
                            @auth
                                <li class="header-item col-6 col-md-4">
                                    <a href="{{ route('dashboard.index') }}" class="header-link">
                                        <div class="icon-box"><i class="fa fa-gauge"></i></div> Dashboard
                                    </a>
                                </li>
                            @endauth
                            @guest
                                <li class="header-item col-6 col-md-4">
                                    <a href="{{ route('login') }}" class="header-link">
                                        <div class="icon-box"><i class="fa fa-door-open"></i></div> Login
                                    </a>
                                </li>
                            @endguest
                            <li class="header-item col-6 col-md-4">
                                <a href="{{ route('collections.index') }}" class="header-link">
                                    <div class="icon-box"><i class="fa fa-tshirt"></i></div> Koleksi
                                </a>
                            </li>
                            <li class="header-item col-6 col-md-4">
                                <a href="{{ route('lookbooks.index') }}" class="header-link">
                                    <div class="icon-box"><i class="fa fa-camera-retro"></i></div> Lookbook
                                </a>
                            </li>
                            <li class="header-item col-6 col-md-4">
                                <a href="{{ route('stories.index') }}" class="header-link">
                                    <div class="icon-box"><i class="fa fa-feather-alt"></i></div> Cerita
                                </a>
                            </li>
                            <li class="header-item col-6 col-md-4">
                                <a href="{{ route('blog.index') }}" class="header-link">
                                    <div class="icon-box"><i class="fa fa-newspaper"></i></div> Artikel
                                </a>
                            </li>
                            <li class="header-item col-6 col-md-4">
                                <a href="{{ route('events.index') }}" class="header-link">
                                    <div class="icon-box"><i class="fa fa-calendar-alt"></i></div> Event
                                </a>
                            </li>
                            <li class="header-item col-6 col-md-4">
                                <a href="{{ route('testimonis.index') }}" class="header-link">
                                    <div class="icon-box"><i class="fa fa-comment"></i></div> Testimoni
                                </a>
                            </li>
                            <li class="header-item col-6 col-md-4">
                                <a href="{{ route('faqs.index') }}" class="header-link">
                                    <div class="icon-box"><i class="fa fa-question-circle"></i></div> FAQ
                                </a>
                            </li>
                            <li class="header-item col-6 col-md-4">
                                <a href="{{ route('contacts.index') }}" class="header-link">
                                    <div class="icon-box"><i class="fa fa-comments"></i></div> Hubungi Kami
                                </a>
                            </li>
                        </div>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</header>

@if (!request()->routeIs('home'))
    <section
        class="banner-section position-relative d-flex flex-column justify-content-center align-items-center text-center text-white overflow-hidden"
        style="background: url('{{ optional($article)->image ? asset('storage/' . optional($article)->image) : asset('assets/images/backgrounds/bg-blog.jpg') }}') center/cover no-repeat;">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>

        <div class="content position-relative w-100 px-3 px-md-5">
            <div class="container py-5">
                <h1 class="fw-bold display-5 mb-3 text-light">{{ optional($article)->title ?? $title }}</h1>
                <p class="lead mb-0 text-light">
                    {{ Str::limit(strip_tags(optional($article)->content), 30) ?? 'Cerita, inspirasi, dan pemikiran dari NDEXO.' }}
                </p>
            </div>
        </div>
    </section>
@else
    <section id="header" class="banner-section position-relative d-flex align-items-end min-vh-100">
        <video class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" autoplay muted loop playsinline>
            <source
                src="{{ $banners && $banners->video ? asset('storage/' . $banners->video) : asset('assets/videos/default-banner.mp4') }}"
                type="video/mp4" />
            Browser Anda tidak mendukung video tag.
        </video>
    </section>
@endif

<style>
    .banner-section {
        min-height: 60vh;
        /* sedikit lebih tinggi */
        padding-top: 100px;
        /* beri ruang untuk header fixed */
        padding-bottom: 60px;
        width: 100%;
    }

    .banner-section .overlay {
        background: rgba(0, 0, 0, 0.55);
        z-index: 1;
    }

    .banner-section .content {
        z-index: 2;
        max-width: 900px;
    }

    .banner-section h1 {
        font-family: 'Playfair Display', serif;
        letter-spacing: 0.5px;
        line-height: 1.2;
    }

    .banner-section p {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    @media (max-width: 768px) {
        .banner-section {
            padding-top: 120px;
            /* header lebih besar di mobile */
            min-height: 55vh;
        }

        .banner-section h1 {
            font-size: 1.75rem;
        }

        .banner-section p {
            font-size: 0.95rem;
        }
    }

    /* Hide mobile logo on desktop */
    .logo-mobile {
        display: none;
    }

    /* Show mobile logo, hide desktop logo & menu on mobile */
    @media (max-width: 767.98px) {
        .logo {
            display: none !important;
        }

        .logo-mobile {
            display: flex !important;
        }

        /* Hide desktop menu */
        .d-md-flex {
            display: none !important;
        }
    }

    .btn-mart {
        border-radius: 12px;
        padding: 8px 14px;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .btn-mart i {
        color: #212529;
        font-size: 16px;
    }

    .btn-mart span {
        color: #000000;
        font-weight: 600;
    }

    .btn-mart:hover {
        background-color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
    }

    .custom-menu {
        min-width: 800px;
        border-radius: 10px;
        border: none;
        background: #fff;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    /* Link dasar */
    .custom-menu .header-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px 12px;
        font-size: 0.95rem;
        font-weight: 600;
        color: #333 !important;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.25s ease;
    }

    /* Hover / focus / active */
    .custom-menu .header-link:hover,
    .custom-menu .header-link:focus,
    .custom-menu .header-link.active {
        background-color: #a67c35 !important;
        color: #fff !important;
        transform: translateX(3px);
    }

    /* Ikon */
    .custom-menu .icon-box {
        flex-shrink: 0;
        width: 32px;
        height: 32px;
        background: rgba(166, 124, 53, 0.1);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #a67c35;
        font-size: 1.1rem;
        transition: all 0.25s ease;
    }

    /* Ikon saat hover */
    .custom-menu .header-link:hover .icon-box,
    .custom-menu .header-link:focus .icon-box,
    .custom-menu .header-link.active .icon-box {
        background-color: #fff;
        color: #a67c35;
    }

    /* Spasi antar item */
    .custom-menu .row {
        flex-wrap: wrap;
    }

    .custom-menu .header-item {
        list-style: none;
    }

    /* Mobile friendly */
    @media (max-width: 576px) {
        .custom-menu {
            min-width: 280px;
            padding: 1rem;
        }

        .custom-menu .header-link {
            font-size: 0.9rem;
            gap: 10px;
        }
    }
</style>
