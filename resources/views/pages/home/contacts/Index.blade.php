<x-HomeLayout :title="__('msg.contacts')" :banners="$banners">
    <section id="contact" class="py-5 bg-light" style="position: relative; z-index: 1;">
        <div class="container">
            <div class="row g-4">
                {{-- Form Contact --}}
                {{-- Leaflet Map --}}
                <div class="col-12 col-md-12">
                    <div class="shadow-sm rounded-4 overflow-hidden" style="height:400px;">
                        <div id="map" style="height:100%; width:100%;"></div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="shadow-sm rounded-4 p-4 bg-white position-relative" style="z-index:2;">
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <form id="contactForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="message_type" class="form-label">Tipe Pesan</label>
                                <select class="form-select" id="message_type" name="message_type" required>
                                    <option value="" selected disabled>Pilih tipe pesan</option>
                                    <option value="Kritik">Kritik</option>
                                    <option value="Saran">Saran</option>
                                    <option value="Pesan">Pesan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100 fw-bold">Kirim via WhatsApp</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Leaflet JS & CSS --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <script>
            // WA form
            document.getElementById('contactForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const name = document.getElementById('name').value.trim();
                const type = document.getElementById('message_type').value.trim();
                const message = document.getElementById('message').value.trim();

                if (!name || !type || !message) {
                    alert('Semua field harus diisi!');
                    return;
                }

                const waNumber = '6281234567890';
                const waMessage = `Halo, saya ${name} (${type}) ingin menghubungi Anda: ${message}`;
                const encodedMessage = encodeURIComponent(waMessage);
                window.open(`https://wa.me/${waNumber}?text=${encodedMessage}`, '_blank');

                document.getElementById('contactForm').reset();
                const alertBox = document.getElementById('alert-success');
                alertBox.textContent = 'Form berhasil dibuka di WhatsApp!';
                alertBox.classList.remove('d-none');
                setTimeout(() => alertBox.classList.add('d-none'), 4000);
            });

            // Leaflet map
            const map = L.map('map', {
                scrollWheelZoom: false
            }).setView([{{ $location['lat'] }}, {{ $location['lng'] }}], 16);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
            }).addTo(map);
            L.marker([{{ $location['lat'] }}, {{ $location['lng'] }}])
                .addTo(map)
                .bindPopup("{{ $location['address'] }}")
                .openPopup();
        </script>
    </section>
</x-HomeLayout>
