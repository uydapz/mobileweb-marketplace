<footer id="footer" class="footer bg-dark text-white position-relative py-6">
  <!-- Wave top sebagai pembatas -->
  <svg class="footer-wave-top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150" preserveAspectRatio="none">
    <defs>
      <linearGradient id="waveGradient" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0%" stop-color="#7B4F24" />
        <stop offset="100%" stop-color="#2E1A0F" />
      </linearGradient>
    </defs>
    <path fill="url(#waveGradient)" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,106.7C672,139,768,181,864,181.3C960,181,1056,139,1152,138.7C1248,139,1344,181,1392,202.7L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"/>
  </svg>

  <div class="container pt-5">
    <div class="row gy-5">
      <!-- Kontak Utama -->
      <div class="col-xl-5">
        <h2 class="mb-4" style="color:#D6A35E;">Ingin berkolaborasi?</h2>
        <div class="d-flex flex-column gap-3">
          <a href="mailto:ndexo.idn@gmail.com" class="d-flex align-items-center gap-2 text-white text-decoration-none fs-5 hover-primary">
            <iconify-icon icon="lucide:mail" class="fs-4" style="color:#D6A35E;"></iconify-icon>
            ndexo.idn@gmail.com
          </a>
          <a href="https://maps.app.goo.gl/hpDp81fqzGt5y4bC8" target="_blank" class="d-flex align-items-center gap-2 text-white text-decoration-none fs-5 hover-primary">
            <iconify-icon icon="lucide:map-pin" class="fs-4" style="color:#D6A35E;"></iconify-icon>
            Malang, Jawa Timur - Indonesia
          </a>
        </div>
      </div>

      <!-- Navigasi -->
      <div class="col-md-4 col-xl-2">
        <h5 class="mb-3" style="color:#D6A35E;">Navigasi</h5>
        <ul class="list-unstyled d-flex flex-column gap-2">
          <li><a href="{{ route('home') }}" class="text-white text-decoration-none hover-primary fs-6">Beranda</a></li>
          {{-- <li><a href="{{ route('home') }}" class="text-white text-decoration-none hover-primary fs-6">Tentang Kami</a></li> --}}
          {{-- <li><a href="#services" class="text-white text-decoration-none hover-primary fs-6">Layanan</a></li> --}}
          {{-- <li><a href="projects.html" class="text-white text-decoration-none hover-primary fs-6">Proyek</a></li> --}}
          <li><a href="{{ route('contacts.index') }}" class="text-white text-decoration-none hover-primary fs-6">Kontak</a></li>
        </ul>
      </div>

      <!-- Sosial Media -->
      <div class="col-md-4 col-xl-2">
        <h5 class="mb-3" style="color:#D6A35E;">Sosial Media</h5>
        <ul class="list-unstyled d-flex flex-column gap-2">
          <li><a href="https://instagram.com/ndexo.id" target="_blank" class="text-white text-decoration-none hover-primary fs-6">Instagram</a></li>
          <li><a href="https://linktr.ee/ndexo.idn" target="_blank" class="text-white text-decoration-none hover-primary fs-6">Linktree</a></li>
        </ul>
      </div>
    </div>
  </div>

  <p class="mb-0 text-white-50 text-center mt-5 fs-3">{{ env('APP_STATUS') }} © {{ env('APP_NAME') }}, <?= date('Y') ?>. All rights reserved.</p>

  <style>
    .footer-wave-top {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 150px;
      z-index: 0;
      transform: translateY(-100%);
      pointer-events: none;
    }
    .footer {
      position: relative;
      overflow: hidden;
      padding-top: 8rem;
      font-family: 'Poppins', sans-serif;
      letter-spacing: 0.02em;
    }
    .hover-primary:hover {
      color: #D6A35E !important;
      transition: color 0.3s ease;
    }
  </style>
</footer>
