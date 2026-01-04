<section id="testimoni" class="testimonial py-5 py-lg-11 py-xl-12 bg-light-gray">
    <div class="container">
        <x-Sectmark num="04" title="Suara Mereka yang Telah Berkarya Bersama" page="Testimoni"
            titleDesc="Dengarkan cerita para mitra dan klien kami yang telah merasakan dampak dari sinergi
                                budaya dan desain modern.
                                Testimoni mereka adalah cermin dari kualitas dan nilai yang kami tanamkan dalam setiap
                                karya." />

        <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">
                @foreach ($testimonis as $item)
                    <div class="swiper-slide">
                        <div class="card h-100 border-0 shadow-sm rounded-4 bg-white p-4">
                            <div class="d-flex align-items-center gap-3">
                                <img src="
                                    {{ Str::startsWith($item->user->avatar, 'http')
                                    ? $item->user->avatar
                                    : asset('storage/' . $item->user->avatar ?? 'adsets/img/avatars/default.png') }}"
                                    alt="avatar" class="rounded-circle" width="60" height="60">
                                <div>
                                    <h6 class="mb-0 fw-semibold">{{ $item->user->name }}</h6>
                                    <small class="text-muted">{{ $item->user->position }}</small>
                                </div>
                            </div>
                            <p class="testimonial-text p-3">
                                <i class="fa-solid fa-quote-left"></i>
                                {{ $item->quote }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>
