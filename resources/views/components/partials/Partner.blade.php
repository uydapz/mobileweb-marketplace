<section id="partner" class="m-3 p-3">
    <div class="marquee w-100 overflow-hidden" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
        <div class="marquee-content d-flex align-items-center gap-8">
            @foreach ($partnerships as $item)
                <div class="marquee-tag hstack justify-content-center" onclick="window.location.href='{{ $item->website }}'">
                    <img src="{{ 'storage/' . $item->logo }}" alt="{{ $item->partner_name }}" class="img-fluid">
                </div>
            @endforeach
        </div>
    </div>
</section>
<style>
    .marquee {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.marquee-content {
  display: flex;
  gap: 2rem; /* jarak antar logo */
  animation: marquee 20s linear infinite;
}

.marquee-content img {
  max-height: 60px; /* biar seragam */
  object-fit: contain;
}

@keyframes marquee {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(-100%);
  }
}
</style>