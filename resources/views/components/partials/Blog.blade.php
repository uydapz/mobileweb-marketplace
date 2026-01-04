    <section id="blog" class="featured-projects py-5 py-lg-11 py-xl-12 bg-light">
        <div class="container">
            <div class="d-flex flex-column gap-5 gap-xl-11">
                <x-Sectmark num="02" title="{{ __('msg.ArticleTitle') }}" page="{{ __('msg.article') }}"
                    titleDesc="{{ __('msg.ArticleTitleDesc') }}" />

                <!-- Slider Carousel -->
                <div class="featured-projects-slider px-3">
                    <div class="owl-carousel owl-theme">
                        @foreach ($articles as $item)
                            <div class="item">
                                <div
                                    class="project-card rounded-4 shadow-sm overflow-hidden bg-white border border-ndexo d-flex flex-column">
                                    <div class="portfolio-img position-relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                            class="img-fluid">
                                        <div class="portfolio-overlay">
                                            <a href="{{ route('blog.show', $item->slug) }}"
                                                class="position-absolute top-50 start-50 translate-middle bg-primary round-64 rounded-circle hstack justify-content-center">
                                                <iconify-icon icon="lucide:arrow-up-right"
                                                    class="fs-8 text-white"></iconify-icon>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-4 d-flex flex-column gap-3">
                                        <h5 class="mb-0 text-dark fw-bold">{{ $item->title }}</h5>
                                        <p> {!! Str::limit(strip_tags($item->content),50) !!}
                                        </p>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge badge-ndexo">{{ $item->user->name ?? 'Unknown' }}</span>
                                            <span class="badge badge-ndexo">{{ $item->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <style>
        .project-card {
            transition: all 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 24px rgba(84, 51, 16, 0.1);
        }

        .project-img {
            height: 220px;
            object-fit: cover;
        }

        .project-img img {
            transition: transform 0.3s ease;
        }

        .project-card:hover .project-img img {
            transform: scale(1.05);
        }

        .project-overlay-btn {
            background-color: rgba(0, 0, 0, 0.35);
            opacity: 0;
            transition: 0.3s ease;
        }

        .badge-ndexo {
            font-size: 0.8rem;
            padding: 0.3rem 0.75rem;
            border: 1px solid rgba(116, 81, 45, 0.4);
            border-radius: 20px;
            background-color: #fcfaf3;
            color: #543310;
            font-weight: 500;
        }
    </style>
