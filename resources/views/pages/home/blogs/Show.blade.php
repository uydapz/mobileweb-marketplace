<x-HomeLayout :title="$article->title" :banners="$banners" :article="$article" :meta_description="$meta_description" :meta_keywords="$meta_keywords"
    :meta_image="$meta_image">
    <section id="blog" class="article-section">
        <div class="container">
            <article class="article-wrapper">
                <!-- Header -->
                <header class="article-header text-center">
                    <h1 class="fw-bold mb-3">{{ $article->title }}</h1>
                    <p class="meta">
                        <i class="bi bi-person"></i> {{ $article->user->name ?? 'NDEXO' }} &nbsp;•&nbsp;
                        <i class="bi bi-calendar"></i> {{ $article->created_at->format('d M Y') }}
                    </p>
                    <div class="divider"></div>
                </header>

                <!-- Konten -->
                <div class="article-body">
                    <div class="editor-content">
                        {!! $article->content !!}
                    </div>
                </div>

                <!-- Tombol kembali -->
                <div class="text-center mt-5">
                    <a href="{{ route('blog.index') }}" class="btn-back">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Artikel
                    </a>
                </div>
            </article>
        </div>

        @if ($relatedArticles->count() > 0)
            <section class="related-articles py-5 bg-light">
                <div class="container">
                    <h3 class="fw-bold mb-4">Artikel Lainnya</h3>
                    <div class="row g-4">
                        @foreach ($relatedArticles as $item)
                            <div class="col-6">
                                <div class="card h-100 shadow-sm rounded-4"
                                    onclick="window.location.href='{{ route('blog.show', $item->slug) }}'">
                                    <div class="article-img overflow-hidden rounded-top">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                            class="img-fluid w-100" style="height:150px; object-fit:cover;">
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="fw-bold">{{ $item->title }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </section>

    <style>
        /* === Root aesthetic === */
        :root {
            --ndexo-dark: #3c2508;
            --ndexo-gold: #a87a2f;
            --ndexo-bg: #f8f4ef;
            --ndexo-text: #1f1c19;
        }

        /* === Section === */
        .article-section {
            background: var(--ndexo-bg);
            padding-top: 130px;
            padding-bottom: 120px;
            min-height: 100vh;
        }

        .article-wrapper {
            max-width: 880px;
            margin: 0 auto;
            background: #fff;
            padding: 3rem 3rem 4rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(60, 37, 8, 0.08);
            animation: fadeUp 0.7s ease-out;
        }

        /* === Header === */
        .article-header h1 {
            color: var(--ndexo-dark);
            font-size: 2.4rem;
            letter-spacing: 0.2px;
            line-height: 1.3;
        }

        .meta {
            color: #7a6a57;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .divider {
            height: 4px;
            width: 80px;
            background: linear-gradient(90deg, var(--ndexo-gold), var(--ndexo-dark));
            border-radius: 10px;
            margin: 0.8rem auto 2rem;
        }

        /* === Konten === */
        .editor-content {
            font-family: "Poppins", sans-serif;
            color: var(--ndexo-text);
            font-size: 1.12rem;
            line-height: 1.85;
            white-space: normal;
            overflow-wrap: break-word;
            word-wrap: break-word;
            text-align: justify;
        }

        .editor-content p {
            margin-bottom: 1.5rem;
        }

        .editor-content img {
            display: block;
            margin: 2.5rem auto;
            border-radius: 14px;
            max-width: 100%;
            height: auto;
            box-shadow: 0 8px 28px rgba(0, 0, 0, 0.1);
        }

        .editor-content h2,
        .editor-content h3 {
            color: var(--ndexo-dark);
            margin-top: 2.5rem;
            font-weight: 700;
        }

        .editor-content ul,
        .editor-content ol {
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* === Tombol kembali === */
        .btn-back {
            display: inline-block;
            padding: 0.7rem 2rem;
            background: var(--ndexo-dark);
            border-radius: 12px;
            color: var(--ndexo-bg);
            font-weight: 600;
            letter-spacing: 0.3px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: linear-gradient(90deg, var(--ndexo-gold), var(--ndexo-dark));
            color: #fff;
        }

        .related-articles .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .article-img img {
            transition: transform 0.3s ease;
        }

        .related-articles .card:hover .article-img img {
            transform: scale(1.05);
        }

        /* === Animasi === */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* === Responsif === */
        @media (max-width: 768px) {
            .article-wrapper {
                padding: 2rem 1.5rem 3rem;
                border-radius: 15px;
            }

            .article-header h1 {
                font-size: 1.9rem;
            }

            .editor-content {
                font-size: 1rem;
                text-align: left;
            }
        }
    </style>
</x-HomeLayout>
