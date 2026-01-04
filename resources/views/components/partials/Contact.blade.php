<section id="contact" class="get-in-touch py-5 py-lg-11 py-xl-12 bg-light">
    <div class="container">
        <div class="d-flex flex-column gap-5 gap-xl-10">
            <x-Sectmark num="06" title="Terhubung langsung dengan kami" page="Contact"
                titleDesc="MinXO selalu ada 24/7" />

            <div class="row justify-content-between gap-7 gap-xl-0 align-items-center">
                <div class="col-xl-4">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/resources/MinXO-telpon.webp') }}" alt="Ilustrasi Batik"
                        class="img-fluid img-mbl rounded-4 shadow-sm" style="max-height: 320px; object-fit: contain;">
                    </div>
                </div>

                <div class="col-xl-8">
                    <form id="contactForm" class="d-flex flex-column gap-6" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="1000" onsubmit="return sendWhatsApp();" novalidate>
                        <div>
                            <input type="text" class="form-control input-style" id="name"
                                placeholder="Name" required />
                        </div>
                        <div>
                            <input type="email" class="form-control input-style" id="email"
                                placeholder="Email" required />
                        </div>
                        <div>
                            <textarea class="form-control input-style textarea-style" id="message"
                                placeholder="Tell us about your project" rows="4" required></textarea>
                        </div>
                        <button type="submit"
                            class="text-light btn btn-primary w-100 submit-btn d-flex align-items-center justify-content-center gap-2">
                            Submit via WhatsApp
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendWhatsApp() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            if(!name || !email || !message) {
                alert('Please fill all fields!');
                return false;
            }

            const waMessage = `Halo NDEXO,%0AName: ${name}%0AEmail: ${email}%0AMessage: ${message}`;
            const waLink = `https://wa.me/6288102635044?text=${waMessage}`;
            window.open(waLink, '_blank');
            return false; // prevent actual form submission
        }
    </script>

    <style>
        .input-style {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1rem;
            border: none;
            border-bottom: 3px solid #D6A35E;
            background-color: transparent;
            color: #333;
            padding: 0.6rem 0.75rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            border-radius: 0;
            box-shadow: none;
        }
        .input-style::placeholder { color: #A78C5D; opacity:1; font-weight:400; }
        .input-style:focus { outline: none; border-bottom-color: #7B4F24; box-shadow: 0 2px 6px rgba(123,79,36,0.3); }
        .textarea-style { min-height: 110px; resize: vertical; }
        .submit-btn { font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.1rem; background: linear-gradient(90deg, #7B4F24 0%, #D6A35E 100%); border: none; box-shadow: 0 4px 10px rgba(214,163,94,0.6); transition: background 0.3s ease; }
        .submit-btn:hover, .submit-btn:focus { background: linear-gradient(90deg, #D6A35E 0%, #7B4F24 100%); box-shadow: 0 6px 14px rgba(214,163,94,0.9); }
        @media (max-width: 768px){ .img-mbl{ max-height: 200px !important; object-fit: contain; } }
    </style>
</section>
