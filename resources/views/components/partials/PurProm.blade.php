<section id="purprom" class="services py-5 py-lg-11 py-xl-12 bg-light" id="services">
  <div class="container">
    <div class="d-flex flex-column gap-5 gap-xl-11 align-items-center">
      <x-Sectmark num="03" title="Visi Misi Ndexo" page="Visi Misi"
        titleDesc="Menampilkan rangkaian proyek kami yang menggabungkan desain modern dengan akar budaya Indonesia. Setiap karya adalah refleksi dari semangat lokal untuk dunia." />
      <!-- Services Tab -->
      <div class="services-tab">
        <div class="row gap-5 gap-xl-0 align-items-center justify-content-center">
          <!-- Container gambar -->
          <div class="col-xl-4 image-wrapper position-relative d-flex justify-content-center align-items-center"
            data-aos="zoom-in" data-aos-delay="100" data-aos-duration="1000" style="min-height: 200px;">
            <img src="{{ asset('assets/images/resources/MinXO-purpose.webp') }}" alt="Our Purpose"
              class="img-fluid img-mbl rounded-4 tab-image active" id="img-purpose" />
            <img src="{{ asset('assets/images/resources/MinXO-promise.webp') }}" alt="Our Promise"
              class="img-fluid img-mbl rounded-4 tab-image" id="img-promise" />
          </div>
          <!-- Konten tab -->
          <div class="col-xl-7 d-flex flex-column align-items-center">
            <div class="d-flex flex-column gap-4 justify-content-center h-100">
              <ul class="nav nav-tabs menu-nav-grid justify-content-center" id="purposeTab" role="tablist"
                data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="purpose-tab" data-bs-toggle="tab"
                    data-bs-target="#purpose" type="button" role="tab" aria-controls="purpose"
                    aria-selected="true">
                    <div class="icon-box">
                      <i class="fas fa-bullseye"></i>
                    </div>
                    <span class="label">Purpose</span>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="promise-tab" data-bs-toggle="tab"
                    data-bs-target="#promise" type="button" role="tab" aria-controls="promise"
                    aria-selected="false">
                    <div class="icon-box">
                      <i class="fas fa-handshake"></i>
                    </div>
                    <span class="label">Promise</span>
                  </button>
                </li>
              </ul>

              <div class="tab-description mt-4 text-center">
                <div class="tab-pane fade show active" id="purpose" role="tabpanel"
                  aria-labelledby="purpose-tab" tabindex="0">
                  <p class="text-dark text-opacity-70 mb-0">
                    " Our purpose is to honor Indonesia’s rich cultural heritage by
                    creating timeless designs that connect tradition with the future "
                  </p>
                </div>
                <div class="tab-pane fade" id="promise" role="tabpanel" aria-labelledby="promise-tab"
                  tabindex="0">
                  <p class="text-dark text-opacity-70 mb-0">
                    " We promise authenticity, quality craftsmanship, and innovation
                    that empowers local artisans and delights our global community "
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Container gambar */
  .image-wrapper {
    position: relative;
    min-height: 320px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* Gambar tab styling dan transisi */
  .tab-image {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    max-width: 100%;
    height: auto;
    opacity: 0;
    pointer-events: none;
    border-radius: 1rem;
    transition: opacity 0.5s ease;
    z-index: 1;
  }

  .tab-image.active {
    opacity: 1;
    pointer-events: auto;
    z-index: 2;
  }

  /* Menu navigasi grid */
  .menu-nav-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
    gap: 1.5rem;
    padding: 0;
    border-bottom: none;
    justify-content: center;
  }

  .menu-nav-grid .nav-item {
    margin: 0px auto;
  }

  .menu-nav-grid .nav-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.35rem;
    padding: 0.75rem 0;
    border: none;
    background: transparent;
    color: #6c757d;
    font-weight: 600;
    font-size: 0.85rem;
    border-radius: 12px;
    transition: color 0.3s ease, background 0.3s ease;
  }

  .menu-nav-grid .nav-link .icon-box {
    width: 56px;
    height: 56px;
    background: rgba(255 255 255 / 0.35);
    backdrop-filter: blur(6px);
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
    color: #7f6b20;
    font-size: 1.8rem;
    transition: background 0.3s ease, box-shadow 0.3s ease,
      color 0.3s ease, transform 0.3s ease;
  }

  .tab-pane {
    display: none;
  }

  .tab-pane.active {
    display: block;
  }

  .menu-nav-grid .nav-link:hover,
  .menu-nav-grid .nav-link:focus,
  .menu-nav-grid .nav-link.active {
    color: #a67c35;
    background: rgba(255 255 255 / 0.6);
  }

  .menu-nav-grid .nav-link:hover .icon-box,
  .menu-nav-grid .nav-link:focus .icon-box,
  .menu-nav-grid .nav-link.active .icon-box {
    background: rgba(255 255 255 / 0.8);
    color: #a67c35;
    box-shadow: 0 6px 20px rgba(166, 124, 53, 0.5);
    transform: translateY(-4px);
  }

  .menu-nav-grid .label {
    display: block;
    color: #a67c35;
  }

  /* RESPONSIVE MOBILE */
  @media (max-width: 768px) {
    .image-wrapper {
      min-height: auto;
      display: block;
    }

    .tab-image {
      position: relative !important;
      left: 0 !important;
      transform: none !important;
      max-width: 100% !important;
      opacity: 0 !important;
      pointer-events: none !important;
      display: none;
      margin-bottom: 1rem;
      max-height: 200px;
      object-fit: contain;
    }

    .tab-image.active {
      opacity: 1 !important;
      pointer-events: auto !important;
      position: relative !important;
      display: block !important;
    }
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll("#purposeTab button.nav-link");
    const descriptions = document.querySelectorAll(".tab-description .tab-pane");
    const images = {
      "purpose-tab": document.getElementById("img-purpose"),
      "promise-tab": document.getElementById("img-promise"),
    };

    function activateTab(tabBtn) {
      // Matikan semua tab & deskripsi
      tabs.forEach((t) => {
        t.classList.remove("active");
        t.setAttribute("aria-selected", "false");
      });
      descriptions.forEach((desc) => desc.classList.remove("show", "active"));
      // Matikan semua gambar
      Object.values(images).forEach((img) => img.classList.remove("active"));

      // Aktifkan tab yang diklik
      tabBtn.classList.add("active");
      tabBtn.setAttribute("aria-selected", "true");

      // Aktifkan deskripsi sesuai target
      const targetDesc = document.querySelector(tabBtn.dataset.bsTarget);
      if (targetDesc) {
        targetDesc.classList.add("show", "active");
      }

      // Aktifkan gambar sesuai tab
      const imgToShow = images[tabBtn.id];
      if (imgToShow) {
        imgToShow.classList.add("active");
      }
    }

    tabs.forEach((tabBtn) => {
      tabBtn.addEventListener("click", (e) => {
        e.preventDefault();
        activateTab(tabBtn);
      });
    });

    // Default aktifkan tab pertama
    activateTab(tabs[0]);
  });
</script>
