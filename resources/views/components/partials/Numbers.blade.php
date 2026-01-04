<section id="numbers" class="stats-facts py-5 py-lg-11 py-xl-12 position-relative overflow-hidden bg-white">
    <div class="container">
        <x-atoms.sectmark num="01" title="Ndexo dalam Angka" page="Statistik Kami"
            titleDesc="Kolaborasi yang Bermakna" />

        <div class="row d-none d-lg-flex align-items-center">
            <!-- Gambar -->
            <div class="col-lg-4 text-center">
                <img src="{{ asset('assets/images/resources/MinXO-desc.webp') }}" alt="Ilustrasi Batik" class="img-fluid"
                    style="max-height: 700px; object-fit: contain;">
            </div>
            <!-- Stats -->
            <div class="col-lg-8">
                <div class="row text-center text-lg-start">
                    <div class="col-4 border-start border-2 border-warning">
                        <h2 class="fs-14 text-dark mb-0"><span class="count"
                                data-target="120">{{ $designs }}</span></h2>
                        <p class="mb-0">{{ __('msg.designs') }}</p>
                    </div>
                    <div class="col-4 border-start border-2 border-warning">
                        <h2 class="fs-14 text-dark mb-0"><span class="count"
                                data-target="5000">{{ $customers }}</span></h2>
                        <p class="mb-0">XOlovers</p>
                    </div>
                    <div class="col-4 border-start border-2 border-warning">
                        <h2 class="fs-14 text-dark mb-0"><span class="count"
                                data-target="15">{{ $collabs }}</span></h2>
                        <p class="mb-0">{{ __('msg.collabs') }}</p>
                    </div>
                    <a href="about-us.html" class="btn mt-4 align-self-start" data-aos="fade-up" data-aos-delay="500"
                        data-aos-duration="1000">
                        <span class="btn-text">Tentang NDEXO</span>
                        <iconify-icon icon="lucide:arrow-up-right"
                            class="btn-icon bg-white text-dark round-52 rounded-circle hstack justify-content-center fs-7 shadow-sm"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>

        <div class="d-lg-none">
            <div class="container">

                <div class="text-center">
                    <img src="{{ asset('assets/images/resources/MinXO-desc.webp') }}" alt="Ilustrasi Batik"
                        class="img-fluid rounded-4 shadow-sm" style="max-height: 200px; object-fit: contain;">
                </div>
                <div class="row row-cols-1 row-cols-sm-3 text-center g-4">
                    <div class="col-4">
                        <div
                            class="pt-4 border-top border-dark h-100 d-flex flex-column align-items-center justify-content-start">
                            <h2 class="fw-bold mb-1 display-6 text-dark">
                                <span class="count" data-target="120">{{ $designs }}</span>
                            </h2>
                            <p class="small text-dark">{{ __('msg.designs') }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div
                            class="pt-4 border-top border-dark h-100 d-flex flex-column align-items-center justify-content-start">
                            <h2 class="fw-bold mb-1 display-6 text-dark">
                                <span class="count" data-target="5000">{{ $customers }}</span>
                            </h2>
                            <p class="small text-dark">XOlovers</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div
                            class="pt-4 border-top border-dark h-100 d-flex flex-column align-items-center justify-content-start">
                            <h2 class="fw-bold mb-1 display-6 text-dark">
                                <span class="count" data-target="15">{{ $collabs }}</span>
                            </h2>
                            <p class="small text-dark">{{ __('msg.collabs') }}</p>
                        </div>
                    </div>
                </div>

                <a href="about-us.html"
                    class="btn btn-dark w-100 mt-4 py-3 d-flex justify-content-center align-items-center gap-2 shadow-sm">
                    Tentang NDEXO
                    <iconify-icon icon="lucide:arrow-up-right" class="fs-5"></iconify-icon>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    .ndexo-mobile-stats {
        padding: 0 20px;
        margin-bottom: 60px;
    }

    /* Hero Container */
    .mobile-hero-container {
        position: relative;
        overflow: hidden;
        border-radius: 18px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        margin-bottom: 32px;
    }

    .hero-image {
        width: 100%;
        height: 240px;
        object-fit: cover;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.2));
    }

    .mobile-overlay-text {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 20px;
        color: white;
    }

    /* Stats */
    .mobile-stats-cards {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        padding: 18px 24px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
    }

    .stat-bubble {
        font-size: 2.2rem;
        font-weight: 700;
        color: #111;
        margin-bottom: 8px;
        font-family: 'Poppins', sans-serif;
    }

    .stat-card p {
        font-size: 0.95rem;
        color: rgba(0, 0, 0, 0.7);
        font-family: 'Inter', sans-serif;
        margin: 0;
    }

    /* Button */
    .btn-dark {
        font-weight: 600;
        font-size: 15px;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .btn-dark:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 576px) {
        .display-6 {
            font-size: 2rem;
        }

        .small {
            font-size: 0.9rem;
            opacity: 0.8;
        }
    }

    @media (max-width: 480px) {
        .hero-image {
            height: 200px;
        }

        .stat-bubble {
            font-size: 1.8rem;
        }

        .stat-card {
            padding: 16px 20px;
        }
    }

    .round-36 {
        width: 36px;
        height: 36px;
        font-size: 14px;
    }
</style>
