<section id="faqs" class="faq py-5 py-lg-11 py-xl-12 bg-ndexo-light position-relative overflow-hidden">
    <div class="container">
        <x-Sectmark num="05" title="Pertanyaan yang sering diajukan" page="Faqs"
            titleDesc="Pertanyaan umum ini kami buat agar mempermudah XOlovers" />

        <div class="row d-none d-lg-flex align-items-center">
            <!-- Kolom Kanan -->
            <div class="col-xl-4 col-xxl-5">
                <img src="{{ asset('assets/images/resources/MinXO-think.webp') }}" alt="Ilustrasi Batik"
                    class="img-fluid rounded-4 shadow-sm" style="max-height: 320px; object-fit: contain;">
            </div>
            <div class="col-xl-8 col-xxl-7">
                <div class="accordion accordion-flush mt-4 d-none d-lg-block" id="faqAccordionDesktop">
                    @foreach ($faqs as $item)
                        <div class="accordion-item border-0 mb-3 rounded-3 shadow-sm" style="background: #fff9f5;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fs-6 fw-semibold text-ndexo-dark p-3"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq{{ $item->id }}Desktop">
                                    {{ $item->question }}
                                </button>
                            </h2>
                            <div id="faq{{ $item->id }}Desktop" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordionDesktop">
                                <div class="accordion-body fs-5 text-ndexo-muted">
                                    {{ $item->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- MOBILE VIEW -->
        <div class="d-lg-none">
            <div class="text-center mb">
                <img src="{{ asset('assets/images/resources/MinXO-think.webp') }}" alt="Ilustrasi Batik"
                    class="img-fluid rounded-4 shadow-sm" style="max-height: 200px; object-fit: contain;">
            </div>
            <div class="accordion accordion-flush" id="faqAccordionMobile">
                <!-- Item 1 -->
                @foreach ($faqs as $item)
                    <div class="accordion-item border-0 mb-3 rounded-3 shadow-sm" style="background: #fff9f5;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fs-6 fw-semibold text-ndexo-dark p-3"
                                type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $item->id }}Mobile">
                                {{ $item->question }}
                            </button>
                        </h2>
                        <div id="faq{{ $item->id }}Mobile" class="accordion-collapse collapse p-3"
                            data-bs-parent="#faqAccordionMobile">
                            <div class="accordion-body fs-5 text-ndexo-muted">
                                {{ $item->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<style>
    /* Warna dan tema */
    .text-ndexo-dark {
        color: #4a3621;
    }

    .text-ndexo-muted {
        color: #8c7553;
    }

    .bg-ndexo-light {
        background-color: #fff8f2;
    }

    .round-36 {
        width: 36px;
        height: 36px;
        font-size: 14px;
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
        .faq h2 {
            font-size: 1.6rem;
        }

        .faq p.fs-5 {
            font-size: 1rem;
        }

        .accordion-button {
            font-size: 1rem !important;
            padding: 1rem 1.25rem !important;
        }

        .accordion-body {
            font-size: 0.95rem !important;
        }
    }
</style>
